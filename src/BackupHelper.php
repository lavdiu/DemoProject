<?php

namespace Lavdiu\DemoApp;

use Laf\Util\Settings;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use ZipArchive;

class BackupHelper
{
    private ?string $path = null;
    private $tableObject = null;
    private ?string $fileNameSql = null;
    private ?string $fileNameZip = null;
    private $logger = null;

    public function __construct($logger = null)
    {
        if (!$logger) {
            $logger = MonologHelper::getPhpOutputLogger(MonologHelper::DEBUG);
        }
        $this->logger = $logger;

        $this->setFileNameSql(Settings::get('database.database_name') . '-' . $this->getDateForFileName() . '.sql');
        $this->setFileNameZip(Settings::get('database.database_name') . '-' . $this->getDateForFileName() . '.zip');


        $this->getLogger()->info('File Name SQL: ', ['e' => $this->getFileNameSql()]);
        $this->getLogger()->info('File Name ZIP: ', ['e' => $this->getFileNameZip()]);
        $this->getLogger()->info('File Name PATH: ', ['e' => $this->getPathWithDb()]);
        $this->getLogger()->info('Storage Object Type: ', ['e' => get_class($this->getTableObject())]);
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger()
    {
        if ($this->logger) {
            return $this->logger;
        } else {
            return new Logger('unconfigured logger');
        }
    }

    /**
     * @param LoggerInterface $logger
     * @return BackupHelper
     */
    public function setLogger($logger)
    {
        $this->logger = $logger;
        return $this;
    }


    public function getDateForFileName(): ?string
    {
        return date('Y.m.d.H.i');
    }

    public function getTmpDir(): string
    {
        return sys_get_temp_dir() . '/';
    }

    /**
     * @return string|null
     */
    public
    function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * @param string|null $path
     * @return BackupHelper
     */
    public function setPath(?string $path): BackupHelper
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return
     */
    public function getTableObject()
    {
        return $this->tableObject;
    }

    /**
     * @param $tableObject
     * @return BackupHelper
     */
    public function setTableObject($tableObject): BackupHelper
    {
        $this->tableObject = $tableObject;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFileNameSql(): ?string
    {
        return $this->fileNameSql;
    }

    /**
     * @param string|null $fileNameSql
     * @return BackupHelper
     */
    public function setFileNameSql(?string $fileNameSql): BackupHelper
    {
        $this->fileNameSql = $fileNameSql;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFileNameZip(): ?string
    {
        return $this->fileNameZip;
    }

    /**
     * @param string|null $fileNameZip
     * @return BackupHelper
     */
    public function setFileNameZip(?string $fileNameZip): BackupHelper
    {
        $this->fileNameZip = $fileNameZip;
        return $this;
    }


    /**
     * @throws \Laf\Exception\MissingConfigParamException
     */
    public function runBackup(): void
    {
        $this->getLogger()->info('Starting backup at ' . date('Y-m-d H:i:s'));

        $mysqlDumpBin = Settings::get('backups.mysql_dump_bin.path');
        $databaseName = Settings::get('database.database_name');
        $databaseUsername = Settings::get('database.username');
        $databasePassword = Settings::get('database.password');
        $fullPath = $this->getTmpDir() . $this->getFileNameSql();

        $cmd = "{$mysqlDumpBin} -u {$databaseUsername}";
        if ($databasePassword != '') {
            $cmd .= " -p'{$databasePassword}'";
        }
        $cmd .= " {$databaseName} > $fullPath";

        $this->getLogger()->debug('Running cmd: ', ['e' => $cmd]);
        shell_exec($cmd);
        $this->compressAndCopy();
        $this->storeLog();
    }

    private function getPathWithDb(): ?string
    {
        $dir = $this->getPath() . Settings::get('database.database_name') . '/';
        if (!file_exists($dir)) {
            $this->getLogger()->info('Directory does not exist, creating', ['e' => $dir]);
            mkdir($dir, 0777);
        }

        return $dir;
    }

    private function compressAndCopy(): void
    {
        $fileZip = $this->getTmpDir() . $this->getFileNameZip();
        $fileSql = $this->getTmpDir() . $this->getFileNameSql();
        $backupLocation = $this->getPathWithDb();

        $this->getLogger()->info('Compressing File: ', [
                'zip' => $this->getTmpDir() . $this->getFileNameZip(),
                'sql' => $fileSql]
        );

        $this->getLogger()->info('Backup Location: ', [
            'e' => $backupLocation
        ]);


        $zipArchive = new ZipArchive;
        if ($zipArchive->open($fileZip, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            $zipArchive->addFile($fileSql, $this->getFileNameSql());
            $zipArchive->setCompressionName($this->getFileNameSql(), ZipArchive::CM_BZIP2);
            $zipArchive->close();

            if (file_exists($fileSql)) {
                $this->getLogger()->info('Deleting file: ', ['e' => $fileSql]);
                unlink($fileSql);
            }

            if (file_exists($fileZip)) {
                copy($fileZip, $backupLocation . $this->getFileNameZip());
                $this->getLogger()->info('Copying file: ', [
                    'from' => $fileZip,
                    'to' => $backupLocation . $this->getFileNameZip(),
                ]);

                unlink($fileZip);
                $this->getLogger()->info('Deleting file: ', ['e' => $fileZip]);
            }

        } else {
            throw new \Exception('ZipArchive Not Supported');
        }
    }

    private function storeLog(): void
    {
        /**
         * @var BackupsDaily $obj
         */
        $obj = $this->getTableObject();
        $obj->setFileNameVal($this->getFileNameZip())
            ->setFilePathVal($this->getPathWithDb() . $this->getFileNameZip())
            ->setFileSizeVal(filesize($this->getPathWithDb() . $this->getFileNameZip()));
        $obj->store();

        $this->getLogger()->info('Storing log: ', ['id' => $obj->getRecordId()]);

    }
}
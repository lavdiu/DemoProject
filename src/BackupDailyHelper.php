<?php

namespace Lavdiu\DemoApp;

use Laf\Database\Db;
use Laf\Util\Settings;

class BackupDailyHelper extends BackupHelper
{

    public function __construct(string $path, $logger = null)
    {
        $this->setPath($path);
        $this->setTableObject(new BackupsDaily());
        if (!$logger) {
            $logger = MonologHelper::getPhpOutputLogger(MonologHelper::DEBUG);
        }
        parent::__construct($logger);
    }


    /**
     * @throws \Laf\Exception\MissingConfigParamException
     */
    public static function run(): void
    {
        $b = new self(Settings::get('backups.daily.path'));
        $b->runBackup();
    }

    public static function cleanup(): void
    {
        $b = new self(Settings::get('backups.daily.path'));

        $days = 30;
        try {
            $days = Settings::get('backups.daily.retention_days');
        } catch (\Exception $ex) {
        }

        $sql = "
        SELECT
        d.id
        FROM backups_daily d
        WHERE d.created_on <= DATE_SUB(NOW() , INTERVAL {$days} DAY)
        ";

        $b->getLogger()->info('Running daily cleanup');

        $rows = Db::getAllAssoc($sql);
        $b->getLogger()->info('Rows found: ' . count($rows));
        foreach ($rows as $row) {
            $record = new BackupsDaily($row['id']);
            if ($record->recordExists()) {
                $b->getLogger()->info('Working on wor with id ' . $record->getIdVal());

                if (file_exists($record->getFilePathVal())) {
                    $b->getLogger()->info('File found ' . $record->getFilePathVal());
                    $b->getLogger()->info('Attempting to delete ' . $record->getFilePathVal());
                    if (unlink($record->getFilePathVal())) {
                        $b->getLogger()->info('File deleted ' . $record->getFilePathVal());
                        $record->hardDelete();
                        $b->getLogger()->info('Record deleted ' . $record->getIdVal());
                    }
                } else {
                    $b->getLogger()->info('File not found ' . $record->getFilePathVal());
                    $b->getLogger()->info('Deleting record ' . $record->getIdVal());
                    $record->hardDelete();
                }
            }
        }
        $b->getLogger()->info('Done ');

    }

}
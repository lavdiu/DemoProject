<?php

namespace Lavdiu\DemoApp;

use Laf\Database\Db;
use Laf\Util\Settings;

class BackupHourlyHelper extends BackupHelper
{
    public function __construct(string $path, $logger = null)
    {
        if (!$logger) {
            $logger = MonologHelper::getPhpOutputLogger(MonologHelper::DEBUG);
        }

        $this->setPath($path);
        $this->setTableObject(new BackupsHourly());
        parent::__construct($logger);
    }


    /**
     * @throws \Laf\Exception\MissingConfigParamException
     */
    public static function run(): void
    {
        $b = new self(Settings::get('backups.hourly.path'));
        $b->setLogger(MonologHelper::getPhpOutputLogger(MonologHelper::DEBUG));
        $b->runBackup();
    }

    public static function cleanup(): void
    {
        $b = new self(Settings::get('backups.daily.path'));

        $days = 10;
        try {
            $days = Settings::get('backups.hourly.retention_days');
        } catch (\Exception $ex) {
        }

        $sql = "
        SELECT
        d.id
        FROM backups_hourly d
        WHERE d.created_on <= DATE_SUB(NOW() , INTERVAL {$days} DAY)
        ";

        $b->getLogger()->info('Running hourly cleanup');

        $rows = Db::getAllAssoc($sql);
        $b->getLogger()->info('Rows found: ' . count($rows));
        foreach ($rows as $row) {
            $record = new BackupsHourly($row['id']);
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
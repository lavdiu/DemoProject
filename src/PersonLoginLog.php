<?php

namespace Lavdiu\DemoApp;

/**
 * Class PersonLoginLog
 * @package asm
 * Main Class for Table person_login_log
 * This class inherits functionality from BasePersonLoginLog.
 * It is generated only once, please include all logic and code here
 */
class PersonLoginLog extends Base\BasePersonLoginLog
{
    /**
     * Instructors constructor.
     * @param int $id
     */
    public function __construct($id = null)
    {
        parent::__construct($id);
    }

    /**
     * Returns the lowest level class in the inheritance tree
     * Used with late static binding to get the lowest level class
     */
    protected function returnLeafClass()
    {
        return $this;
    }

    /**
     * Find one row by using the first result
     * @param array $keyValuePairs
     * @return PersonLoginLog
     * @throws \Exception
     */
    public static function findOne(array $keyValuePairs): ?PersonLoginLog
    {
        return parent::bOfindOne($keyValuePairs);
    }

    /**
     * @param array $keyValuePairs
     * @return PersonLoginLog[]
     * @throws \Exception
     */
    public static function find(array $keyValuePairs): array
    {
        return parent::bOfind($keyValuePairs);
    }

    public static function getIcon(): ?string
    {
        return 'fas fa-history';
    }
}

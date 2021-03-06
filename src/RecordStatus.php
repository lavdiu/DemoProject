<?php

namespace Lavdiu\DemoApp;

/**
 * Class RecordStatus
 * @package Lavdiu\DemoApp
 * Main Class for Table record_status
 * This class inherits functionality from BaseRecordStatus.
 * It is generated only once, please include all logic and code here
 */
class RecordStatus extends Base\BaseRecordStatus
{
    const ACTIVE = 1;
    const PENDING = 2;
    const BANNED = 3;
    const SUSPENDED = 4;
    const DELETED = 5;
    const ARCHIVED = 6;
    const PAUSED = 7;

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
	 * @return RecordStatus
	 * @throws \Exception
	 */
	public static function findOne(array $keyValuePairs) : ?RecordStatus
	{
		return parent::bOfindOne($keyValuePairs);
	}
	
	/**
	 * @param array $keyValuePairs
	 * @return RecordStatus[]
	 * @throws \Exception
	 */
	public static function find(array $keyValuePairs = []) : array
	{
		return parent::bOfind($keyValuePairs);
	}
}

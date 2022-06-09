<?php

namespace Lavdiu\DemoApp;

/**
 * Class ChangeLog
 * @package Lavdiu\DemoApp
 * Main Class for Table change_log
 * This class inherits functionality from BaseChangeLog.
 * It is generated only once, please include all logic and code here
 */
class ChangeLog extends Base\BaseChangeLog
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
	 * @return ChangeLog
	 * @throws \Exception
	 */
	public static function findOne(array $keyValuePairs) : ?ChangeLog
	{
		return parent::bOfindOne($keyValuePairs);
	}
	
	/**
	 * @param array $keyValuePairs
	 * @return ChangeLog[]
	 * @throws \Exception
	 */
	public static function find(array $keyValuePairs = []) : array
	{
		return parent::bOfind($keyValuePairs);
	}
}

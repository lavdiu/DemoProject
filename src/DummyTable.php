<?php

namespace Lavdiu\DemoApp;

/**
 * Class DummyTable
 * @package Lavdiu\DemoApp
 * Main Class for Table dummy_table
 * This class inherits functionality from BaseDummyTable.
 * It is generated only once, please include all logic and code here
 */
class DummyTable extends Base\BaseDummyTable
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
	 * @return DummyTable
	 * @throws \Exception
	 */
	public static function findOne(array $keyValuePairs) : ?DummyTable
	{
		return parent::bOfindOne($keyValuePairs);
	}
	
	/**
	 * @param array $keyValuePairs
	 * @return DummyTable[]
	 * @throws \Exception
	 */
	public static function find(array $keyValuePairs = []) : array
	{
		return parent::bOfind($keyValuePairs);
	}
}

<?php

namespace Lavdiu\DemoApp;

/**
 * Class LafSchemaObject
 * @package Lavdiu\DemoApp
 * Main Class for Table laf_schema_object
 * This class inherits functionality from BaseLafSchemaObject.
 * It is generated only once, please include all logic and code here
 */
class LafSchemaObject extends Base\BaseLafSchemaObject
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
	 * @return LafSchemaObject
	 * @throws \Exception
	 */
	public static function findOne(array $keyValuePairs) : ?LafSchemaObject
	{
		return parent::bOfindOne($keyValuePairs);
	}
	
	/**
	 * @param array $keyValuePairs
	 * @return LafSchemaObject[]
	 * @throws \Exception
	 */
	public static function find(array $keyValuePairs = []) : array
	{
		return parent::bOfind($keyValuePairs);
	}
}

<?php

namespace Lavdiu\DemoApp;

/**
 * Class Group
 * @package Lavdiu\DemoApp
 * Main Class for Table group
 * This class inherits functionality from BaseGroup.
 * It is generated only once, please include all logic and code here
 */
class Group extends Base\BaseGroup
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
	 * @return Group
	 * @throws \Exception
	 */
	public static function findOne(array $keyValuePairs) : ?Group
	{
		return parent::bOfindOne($keyValuePairs);
	}
	
	/**
	 * @param array $keyValuePairs
	 * @return Group[]
	 * @throws \Exception
	 */
	public static function find(array $keyValuePairs = []) : array
	{
		return parent::bOfind($keyValuePairs);
	}
}

<?php

namespace Lavdiu\DemoApp;

/**
 * Class PersonGroup
 * @package Asm
 * Main Class for Table person_group
 * This class inherits functionality from BasePersonGroup.
 * It is generated only once, please include all logic and code here
 */
class PersonGroup extends Base\BasePersonGroup
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
	 * @return PersonGroup
	 * @throws \Exception
	 */
	public static function findOne(array $keyValuePairs) : ?PersonGroup
	{
		return parent::bOfindOne($keyValuePairs);
	}
	
	/**
	 * @param array $keyValuePairs
	 * @return PersonGroup[]
	 * @throws \Exception
	 */
	public static function find(array $keyValuePairs = []) : array
	{
		return parent::bOfind($keyValuePairs);
	}
}

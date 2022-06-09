<?php

namespace Lavdiu\DemoApp;

/**
 * Class EmailAttachment
 * @package Lavdiu\DemoApp
 * Main Class for Table email_attachment
 * This class inherits functionality from BaseEmailAttachment.
 * It is generated only once, please include all logic and code here
 */
class EmailAttachment extends Base\BaseEmailAttachment
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
	 * @return EmailAttachment
	 * @throws \Exception
	 */
	public static function findOne(array $keyValuePairs) : ?EmailAttachment
	{
		return parent::bOfindOne($keyValuePairs);
	}
	
	/**
	 * @param array $keyValuePairs
	 * @return EmailAttachment[]
	 * @throws \Exception
	 */
	public static function find(array $keyValuePairs = []) : array
	{
		return parent::bOfind($keyValuePairs);
	}
}

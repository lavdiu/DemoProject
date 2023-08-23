<?php

namespace Lavdiu\DemoApp;

use Laf\Database\Db;

/**
 * Class AppConfiguration
 * @package Lavdiu\DemoApp
 * Main Class for Table app_configuration
 * This class inherits functionality from BaseAppConfiguration.
 * It is generated only once, please include all logic and code here
 */
class AppConfiguration extends Base\BaseAppConfiguration
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
	 * @return AppConfiguration
	 * @throws \Exception
	 */
	public static function findOne(array $keyValuePairs) : ?AppConfiguration
	{
		return parent::bOfindOne($keyValuePairs);
	}
	
	/**
	 * @param array $keyValuePairs
	 * @return AppConfiguration[]
	 * @throws \Exception
	 */
	public static function find(array $keyValuePairs = []) : array
	{
		return parent::bOfind($keyValuePairs);
	}

    /**
     * @throws \Exception
     */
    public static function getAllProperties(): array
    {
        $res = Db::getAllAssoc("SELECT * FROM app_configuration");
        $tmp = [];
        foreach ($res as $r) {
            $tmp[$r['var_name']] = $r['var_value'];
        }
        return $tmp;
    }

    public static function hasProperty(string $property): bool
    {
        return array_key_exists($property, self::getAllProperties());
    }

    public static function getProperty(string $property): ?string
    {
        return self::getAllProperties()[$property] ?? null;
    }
}

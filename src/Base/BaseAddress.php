<?php

namespace Lavdiu\DemoApp\Base;

use Laf\Database;
use Laf\Database\Table;
use Laf\Database\Field\Field;
use Laf\Database\PrimaryKey;
use Laf\Database\ForeignKey;
use Laf\UI\Form\FormElementInterface;
use Laf\UI\ComponentInterface;
use Lavdiu\DemoApp\Address;
use Laf\Exception\InvalidForeignKeyValue;

/**
 * Class BaseAddress
 * @package Lavdiu\DemoApp\Base
 * Base Class for Table address
 * Basic definition of the fields and relationship with the Database Table address
 * This class will be auto-generated every time there is a schema change
 * Please do not add code here. Instead add your code at the main class one directory above
 */
class BaseAddress extends Database\BaseObject
{
	/**
	 * Instructors constructor.
	 * @param int $id
	 */
	public function __construct($id = null)
	{
		parent::__construct($id);
		$this->buildClass();
		$this->setRecordId($id);
		if (is_numeric($id) && in_array($this->getTable()->getPrimaryKey()->getFirstField()->getType(), [Database\Field\FieldType::TYPE_BIG_INTEGER, Database\Field\FieldType::TYPE_INTEGER])) {
			self::select($id);
		} else if ($id != '') {
			self::select($id);
		}
	}

	/**
	 * Select the record by primary key
	 * @param int $id
	 * @return bool
	 * @throws \Exception
	 */
	public function select($id) : bool
	{
		$this->setRecordId($id);
		return parent::select($id);
	}

	/**
	 * Build the class  properties and link it to the db table
	 *
	 */
	private function buildClass()
	{
		$this->setTable(new Table('address'));
		/**
		 * Generate field data
		 */
		$pk = new PrimaryKey();
		$field = (new Field())
			->setName("id")
			->setLabel("Id")
			->setPlaceHolder("Id")
			->setRequired(true)
			->setMaxLength(255)
			->setAutoIncrement(true)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$pk->addField($field);
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("address1")
			->setLabel("Address1")
			->setPlaceHolder("Address1")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("address2")
			->setLabel("Address2")
			->setPlaceHolder("Address2")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("city")
			->setLabel("City")
			->setPlaceHolder("City")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("state_province")
			->setLabel("State Province")
			->setPlaceHolder("State Province")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("postal_code")
			->setLabel("Postal Code")
			->setPlaceHolder("Postal Code")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("country_id")
			->setLabel("Country")
			->setPlaceHolder("Country")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("attention")
			->setLabel("Attention")
			->setPlaceHolder("Attention")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$this->getTable()->setPrimaryKey($pk);

		/**
		 * Generating Foreign keys
		 */
		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("country_id"))
				->setKeyName('address_country_fk')
				->setReferencingTable("country")
				->setReferencingField("id")
		);

	}

	/**
	 * Set Id value
	 * @param mixed $value
	 * @return Address
	 * @throws InvalidForeignKeyValue
	 */
	public function setIdVal($value = null)
	{
		$this->setFieldValue("id", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Id value
	 * @return mixed
	 */
	public function getIdVal()
	{
		return $this->getFieldValue("id");
	}

	/**
	 * Get Id field reference
	 * @return Field
	 */
	public function getIdFld()
	{
		return $this->getField("id");
	}

	/**
	 * Get Id form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getIdFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("id")->getFormElement($formElementOverride);
	}

	/**
	 * Set Address1 value
	 * @param mixed $value
	 * @return Address
	 * @throws InvalidForeignKeyValue
	 */
	public function setAddress1Val($value = null)
	{
		$this->setFieldValue("address1", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Address1 value
	 * @return mixed
	 */
	public function getAddress1Val()
	{
		return $this->getFieldValue("address1");
	}

	/**
	 * Get Address1 field reference
	 * @return Field
	 */
	public function getAddress1Fld()
	{
		return $this->getField("address1");
	}

	/**
	 * Get Address1 form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getAddress1FormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("address1")->getFormElement($formElementOverride);
	}

	/**
	 * Set Address2 value
	 * @param mixed $value
	 * @return Address
	 * @throws InvalidForeignKeyValue
	 */
	public function setAddress2Val($value = null)
	{
		$this->setFieldValue("address2", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Address2 value
	 * @return mixed
	 */
	public function getAddress2Val()
	{
		return $this->getFieldValue("address2");
	}

	/**
	 * Get Address2 field reference
	 * @return Field
	 */
	public function getAddress2Fld()
	{
		return $this->getField("address2");
	}

	/**
	 * Get Address2 form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getAddress2FormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("address2")->getFormElement($formElementOverride);
	}

	/**
	 * Set City value
	 * @param mixed $value
	 * @return Address
	 * @throws InvalidForeignKeyValue
	 */
	public function setCityVal($value = null)
	{
		$this->setFieldValue("city", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get City value
	 * @return mixed
	 */
	public function getCityVal()
	{
		return $this->getFieldValue("city");
	}

	/**
	 * Get City field reference
	 * @return Field
	 */
	public function getCityFld()
	{
		return $this->getField("city");
	}

	/**
	 * Get City form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getCityFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("city")->getFormElement($formElementOverride);
	}

	/**
	 * Set State Province value
	 * @param mixed $value
	 * @return Address
	 * @throws InvalidForeignKeyValue
	 */
	public function setStateProvinceVal($value = null)
	{
		$this->setFieldValue("state_province", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get State Province value
	 * @return mixed
	 */
	public function getStateProvinceVal()
	{
		return $this->getFieldValue("state_province");
	}

	/**
	 * Get State Province field reference
	 * @return Field
	 */
	public function getStateProvinceFld()
	{
		return $this->getField("state_province");
	}

	/**
	 * Get State Province form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getStateProvinceFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("state_province")->getFormElement($formElementOverride);
	}

	/**
	 * Set Postal Code value
	 * @param mixed $value
	 * @return Address
	 * @throws InvalidForeignKeyValue
	 */
	public function setPostalCodeVal($value = null)
	{
		$this->setFieldValue("postal_code", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Postal Code value
	 * @return mixed
	 */
	public function getPostalCodeVal()
	{
		return $this->getFieldValue("postal_code");
	}

	/**
	 * Get Postal Code field reference
	 * @return Field
	 */
	public function getPostalCodeFld()
	{
		return $this->getField("postal_code");
	}

	/**
	 * Get Postal Code form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getPostalCodeFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("postal_code")->getFormElement($formElementOverride);
	}

	/**
	 * Set Country value
	 * @param mixed $value
	 * @return Address
	 * @throws InvalidForeignKeyValue
	 */
	public function setCountryIdVal($value = null)
	{
		$this->setFieldValue("country_id", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Country value
	 * @return mixed
	 */
	public function getCountryIdVal()
	{
		return $this->getFieldValue("country_id");
	}

	/**
	 * Get Country field reference
	 * @return Field
	 */
	public function getCountryIdFld()
	{
		return $this->getField("country_id");
	}

	/**
	 * Get Country form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getCountryIdFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("country_id")->getFormElement($formElementOverride);
	}

	/**
	 * Get Country Object
	 * @return \Lavdiu\DemoApp\Country
	 */
	public function getCountryIdObj()
	{
		if (is_numeric($this->getCountryIdVal())) {
			return new \Lavdiu\DemoApp\Country($this->getCountryIdVal());
		} else {
			return new \Lavdiu\DemoApp\Country();
		}
	}

	/**
	 * Set Attention value
	 * @param mixed $value
	 * @return Address
	 * @throws InvalidForeignKeyValue
	 */
	public function setAttentionVal($value = null)
	{
		$this->setFieldValue("attention", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Attention value
	 * @return mixed
	 */
	public function getAttentionVal()
	{
		return $this->getFieldValue("attention");
	}

	/**
	 * Get Attention field reference
	 * @return Field
	 */
	public function getAttentionFld()
	{
		return $this->getField("attention");
	}

	/**
	 * Get Attention form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getAttentionFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("attention")->getFormElement($formElementOverride);
	}

	/**
	 * Get all rows as associative array
	 * @return string[]
	 * @throws \Exception
	 */
	public function listAllArray(): array
	{
		$db = Database\Db::getInstance();
		$sql = "SELECT * FROM {$this->getTable()->getName()} ORDER BY {$this->getTable()->getPrimaryKey()->getFirstField()->getName()} ASC";
		$res = $db->query($sql);
		return $res->fetchAll(\PDO::FETCH_ASSOC);
	}

	/**
	 * Gets all rows and instantiates the object for all
	 * Then returns an array of all objects
	 * Please be careful, this can be bad for large tables
	 * @return Address[]
	 * @throws \Exception
	 */
	public function listAllObjects(): array
	{
		$db = Database\Db::getInstance();
		$primaryKeyField = $this->getTable()->getPrimaryKey()->getFirstField()->getName();
		$sql = "SELECT {$this->getTable()->getPrimaryKey()->getFirstField()->getName()} FROM {$this->getTable()->getName()} ORDER BY {$primaryKeyField} ASC";
		$res = $db->query($sql);

		$objects = [];
		$allIds = $res->fetchAll(\PDO::FETCH_ASSOC);
		foreach ($allIds as $id) {
			$objects[] = new static($id[$primaryKeyField]);
		}
		return $objects;
	}

	/**
	* Return all fields as form elements
	* @return FormElementInterface[]
	*/
	public function getAllFieldsAsFormElements() : array{
		$tmp = [];
		foreach($this->getTable()->getFields() as $field){
			$tmp[] = $field->getFormElement();
		}
		return $tmp;
	}

}

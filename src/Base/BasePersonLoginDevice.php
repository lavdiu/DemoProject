<?php

namespace Lavdiu\DemoApp\Base;

use Laf\Database;
use Laf\Database\Table;
use Laf\Database\Field\Field;
use Laf\Database\PrimaryKey;
use Laf\Database\ForeignKey;
use Laf\UI\Form\FormElementInterface;
use Laf\UI\ComponentInterface;
use Lavdiu\DemoApp\PersonLoginDevice;
use Laf\Exception\InvalidForeignKeyValue;

/**
 * Class BasePersonLoginDevice
 * @package Lavdiu\DemoApp\Base
 * Base Class for Table person_login_device
 * Basic definition of the fields and relationship with the Database Table person_login_device
 * This class will be auto-generated every time there is a schema change
 * Please do not add code here. Instead add your code at the main class one directory above
 */
class BasePersonLoginDevice extends Database\BaseObject
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
		$this->setTable(new Table('person_login_device'));
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
			->setName("person_id")
			->setLabel("Person")
			->setPlaceHolder("Person")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("ip_address")
			->setLabel("Ip Address")
			->setPlaceHolder("Ip Address")
			->setRequired(false)
			->setMaxLength(100)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("cookie")
			->setLabel("Cookie")
			->setPlaceHolder("Cookie")
			->setRequired(false)
			->setMaxLength(100)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("created_on")
			->setLabel("Created On")
			->setPlaceHolder("Created On")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeDateTime());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("device_name")
			->setLabel("Device Name")
			->setPlaceHolder("Device Name")
			->setRequired(false)
			->setMaxLength(65535)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeText());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("approved_by")
			->setLabel("Approved By")
			->setPlaceHolder("Approved By")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("approved_on")
			->setLabel("Approved On")
			->setPlaceHolder("Approved On")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeDateTime());
		$this->getTable()->addField($field);
		$field = null;

		$this->getTable()->setPrimaryKey($pk);

		/**
		 * Generating Foreign keys
		 */
		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("person_id"))
				->setKeyName('demoapp_person_login_device_person_id_fk')
				->setReferencingTable("person")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("approved_by"))
				->setKeyName('demoapp_person_login_device_approved_by_fk')
				->setReferencingTable("person")
				->setReferencingField("id")
		);

	}

	/**
	 * Set Id value
	 * @param mixed $value
	 * @return PersonLoginDevice
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
	 * Set Person value
	 * @param mixed $value
	 * @return PersonLoginDevice
	 * @throws InvalidForeignKeyValue
	 */
	public function setPersonIdVal($value = null)
	{
		$this->setFieldValue("person_id", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Person value
	 * @return mixed
	 */
	public function getPersonIdVal()
	{
		return $this->getFieldValue("person_id");
	}

	/**
	 * Get Person field reference
	 * @return Field
	 */
	public function getPersonIdFld()
	{
		return $this->getField("person_id");
	}

	/**
	 * Get Person form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getPersonIdFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("person_id")->getFormElement($formElementOverride);
	}

	/**
	 * Get Person Object
	 * @return \Lavdiu\DemoApp\Person
	 */
	public function getPersonIdObj()
	{
		if (is_numeric($this->getPersonIdVal())) {
			return new \Lavdiu\DemoApp\Person($this->getPersonIdVal());
		} else {
			return new \Lavdiu\DemoApp\Person();
		}
	}

	/**
	 * Set Ip Address value
	 * @param mixed $value
	 * @return PersonLoginDevice
	 * @throws InvalidForeignKeyValue
	 */
	public function setIpAddressVal($value = null)
	{
		$this->setFieldValue("ip_address", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Ip Address value
	 * @return mixed
	 */
	public function getIpAddressVal()
	{
		return $this->getFieldValue("ip_address");
	}

	/**
	 * Get Ip Address field reference
	 * @return Field
	 */
	public function getIpAddressFld()
	{
		return $this->getField("ip_address");
	}

	/**
	 * Get Ip Address form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getIpAddressFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("ip_address")->getFormElement($formElementOverride);
	}

	/**
	 * Set Cookie value
	 * @param mixed $value
	 * @return PersonLoginDevice
	 * @throws InvalidForeignKeyValue
	 */
	public function setCookieVal($value = null)
	{
		$this->setFieldValue("cookie", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Cookie value
	 * @return mixed
	 */
	public function getCookieVal()
	{
		return $this->getFieldValue("cookie");
	}

	/**
	 * Get Cookie field reference
	 * @return Field
	 */
	public function getCookieFld()
	{
		return $this->getField("cookie");
	}

	/**
	 * Get Cookie form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getCookieFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("cookie")->getFormElement($formElementOverride);
	}

	/**
	 * Set Created On value
	 * @param mixed $value
	 * @return PersonLoginDevice
	 * @throws InvalidForeignKeyValue
	 */
	public function setCreatedOnVal($value = null)
	{
		$this->setFieldValue("created_on", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Created On value
	 * @return mixed
	 */
	public function getCreatedOnVal()
	{
		return $this->getFieldValue("created_on");
	}

	/**
	 * Get Created On field reference
	 * @return Field
	 */
	public function getCreatedOnFld()
	{
		return $this->getField("created_on");
	}

	/**
	 * Get Created On form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getCreatedOnFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("created_on")->getFormElement($formElementOverride);
	}

	/**
	 * Set Device Name value
	 * @param mixed $value
	 * @return PersonLoginDevice
	 * @throws InvalidForeignKeyValue
	 */
	public function setDeviceNameVal($value = null)
	{
		$this->setFieldValue("device_name", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Device Name value
	 * @return mixed
	 */
	public function getDeviceNameVal()
	{
		return $this->getFieldValue("device_name");
	}

	/**
	 * Get Device Name field reference
	 * @return Field
	 */
	public function getDeviceNameFld()
	{
		return $this->getField("device_name");
	}

	/**
	 * Get Device Name form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getDeviceNameFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("device_name")->getFormElement($formElementOverride);
	}

	/**
	 * Set Approved By value
	 * @param mixed $value
	 * @return PersonLoginDevice
	 * @throws InvalidForeignKeyValue
	 */
	public function setApprovedByVal($value = null)
	{
		$this->setFieldValue("approved_by", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Approved By value
	 * @return mixed
	 */
	public function getApprovedByVal()
	{
		return $this->getFieldValue("approved_by");
	}

	/**
	 * Get Approved By field reference
	 * @return Field
	 */
	public function getApprovedByFld()
	{
		return $this->getField("approved_by");
	}

	/**
	 * Get Approved By form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getApprovedByFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("approved_by")->getFormElement($formElementOverride);
	}

	/**
	 * Get Person Object
	 * @return \Lavdiu\DemoApp\Person
	 */
	public function getApprovedByObj()
	{
		if (is_numeric($this->getApprovedByVal())) {
			return new \Lavdiu\DemoApp\Person($this->getApprovedByVal());
		} else {
			return new \Lavdiu\DemoApp\Person();
		}
	}

	/**
	 * Set Approved On value
	 * @param mixed $value
	 * @return PersonLoginDevice
	 * @throws InvalidForeignKeyValue
	 */
	public function setApprovedOnVal($value = null)
	{
		$this->setFieldValue("approved_on", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Approved On value
	 * @return mixed
	 */
	public function getApprovedOnVal()
	{
		return $this->getFieldValue("approved_on");
	}

	/**
	 * Get Approved On field reference
	 * @return Field
	 */
	public function getApprovedOnFld()
	{
		return $this->getField("approved_on");
	}

	/**
	 * Get Approved On form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getApprovedOnFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("approved_on")->getFormElement($formElementOverride);
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
	 * @return PersonLoginDevice[]
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

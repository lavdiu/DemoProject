<?php

namespace Lavdiu\DemoApp\Base;

use Laf\Database;
use Laf\Database\Table;
use Laf\Database\Field\Field;
use Laf\Database\PrimaryKey;
use Laf\Database\ForeignKey;
use Laf\UI\Form\FormElementInterface;
use Laf\UI\ComponentInterface;
use Lavdiu\DemoApp\PersonPasswordHistory;
use Laf\Exception\InvalidForeignKeyValue;

/**
 * Class BasePersonPasswordHistory
 * @package Lavdiu\DemoApp\Base
 * Base Class for Table person_password_history
 * Basic definition of the fields and relationship with the Database Table person_password_history
 * This class will be auto-generated every time there is a schema change
 * Please do not add code here. Instead add your code at the main class one directory above
 */
class BasePersonPasswordHistory extends Database\BaseObject
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
		$this->setTable(new Table('person_password_history'));
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
			->setName("password")
			->setLabel("Password")
			->setPlaceHolder("Password")
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
				->setField($this->getTable()->getField("person_id"))
				->setKeyName('demoapp_lafperson_pass_history_login_log_fk1')
				->setReferencingTable("person")
				->setReferencingField("id")
		);

	}

	/**
	 * Set Id value
	 * @param mixed $value
	 * @return PersonPasswordHistory
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
	 * @return PersonPasswordHistory
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
	 * Set Created On value
	 * @param mixed $value
	 * @return PersonPasswordHistory
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
	 * Set Password value
	 * @param mixed $value
	 * @return PersonPasswordHistory
	 * @throws InvalidForeignKeyValue
	 */
	public function setPasswordVal($value = null)
	{
		$this->setFieldValue("password", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Password value
	 * @return mixed
	 */
	public function getPasswordVal()
	{
		return $this->getFieldValue("password");
	}

	/**
	 * Get Password field reference
	 * @return Field
	 */
	public function getPasswordFld()
	{
		return $this->getField("password");
	}

	/**
	 * Get Password form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getPasswordFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("password")->getFormElement($formElementOverride);
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
	 * @return PersonPasswordHistory[]
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

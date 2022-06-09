<?php

namespace Lavdiu\DemoApp\Base;

use Laf\Database;
use Laf\Database\Table;
use Laf\Database\Field\Field;
use Laf\Database\PrimaryKey;
use Laf\Database\ForeignKey;
use Laf\UI\Form\FormElementInterface;
use Laf\UI\ComponentInterface;
use Lavdiu\DemoApp\PersonGroup;
use Laf\Exception\InvalidForeignKeyValue;

/**
 * Class BasePersonGroup
 * @package Lavdiu\DemoApp\Base
 * Base Class for Table person_group
 * Basic definition of the fields and relationship with the Database Table person_group
 * This class will be auto-generated every time there is a schema change
 * Please do not add code here. Instead add your code at the main class one directory above
 */
class BasePersonGroup extends Database\BaseObject
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
		$this->setTable(new Table('person_group'));
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
			->setRequired(true)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("group_id")
			->setLabel("Group")
			->setPlaceHolder("Group")
			->setRequired(true)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$this->getTable()->setPrimaryKey($pk);

		/**
		 * Generating Foreign keys
		 */
		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("person_id"))
				->setKeyName('person_group_person_id_fk')
				->setReferencingTable("person")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("group_id"))
				->setKeyName('person_group_group_id_fk')
				->setReferencingTable("group")
				->setReferencingField("id")
		);

	}

	/**
	 * Set Id value
	 * @param mixed $value
	 * @return PersonGroup
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
	 * @return PersonGroup
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
	 * Set Group value
	 * @param mixed $value
	 * @return PersonGroup
	 * @throws InvalidForeignKeyValue
	 */
	public function setGroupIdVal($value = null)
	{
		$this->setFieldValue("group_id", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Group value
	 * @return mixed
	 */
	public function getGroupIdVal()
	{
		return $this->getFieldValue("group_id");
	}

	/**
	 * Get Group field reference
	 * @return Field
	 */
	public function getGroupIdFld()
	{
		return $this->getField("group_id");
	}

	/**
	 * Get Group form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getGroupIdFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("group_id")->getFormElement($formElementOverride);
	}

	/**
	 * Get Group Object
	 * @return \Lavdiu\DemoApp\Group
	 */
	public function getGroupIdObj()
	{
		if (is_numeric($this->getGroupIdVal())) {
			return new \Lavdiu\DemoApp\Group($this->getGroupIdVal());
		} else {
			return new \Lavdiu\DemoApp\Group();
		}
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
	 * @return PersonGroup[]
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

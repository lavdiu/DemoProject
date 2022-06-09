<?php

namespace Lavdiu\DemoApp\Base;

use Laf\Database;
use Laf\Database\Table;
use Laf\Database\Field\Field;
use Laf\Database\PrimaryKey;
use Laf\Database\ForeignKey;
use Laf\UI\Form\FormElementInterface;
use Laf\UI\ComponentInterface;
use Lavdiu\DemoApp\Role;
use Laf\Exception\InvalidForeignKeyValue;

/**
 * Class BaseRole
 * @package Lavdiu\DemoApp\Base
 * Base Class for Table role
 * Basic definition of the fields and relationship with the Database Table role
 * This class will be auto-generated every time there is a schema change
 * Please do not add code here. Instead add your code at the main class one directory above
 */
class BaseRole extends Database\BaseObject
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
		$this->setTable(new Table('role'));
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
			->setName("label")
			->setLabel("Label")
			->setPlaceHolder("Label")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("description")
			->setLabel("Description")
			->setPlaceHolder("Description")
			->setRequired(false)
			->setMaxLength(65535)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeText());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("record_status_id")
			->setLabel("Record Status")
			->setPlaceHolder("Record Status")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("unique_name")
			->setLabel("Unique Name")
			->setPlaceHolder("Unique Name")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(true)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addUniqueField($field);
		$this->getTable()->addField($field);
		$field = null;

		$this->getTable()->setPrimaryKey($pk);

		/**
		 * Generating Foreign keys
		 */
		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("record_status_id"))
				->setKeyName('role_record_status_id_fk_idx')
				->setReferencingTable("record_status")
				->setReferencingField("id")
		);

	}

	/**
	 * Set Id value
	 * @param mixed $value
	 * @return Role
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
	 * Set Label value
	 * @param mixed $value
	 * @return Role
	 * @throws InvalidForeignKeyValue
	 */
	public function setLabelVal($value = null)
	{
		$this->setFieldValue("label", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Label value
	 * @return mixed
	 */
	public function getLabelVal()
	{
		return $this->getFieldValue("label");
	}

	/**
	 * Get Label field reference
	 * @return Field
	 */
	public function getLabelFld()
	{
		return $this->getField("label");
	}

	/**
	 * Get Label form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getLabelFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("label")->getFormElement($formElementOverride);
	}

	/**
	 * Set Description value
	 * @param mixed $value
	 * @return Role
	 * @throws InvalidForeignKeyValue
	 */
	public function setDescriptionVal($value = null)
	{
		$this->setFieldValue("description", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Description value
	 * @return mixed
	 */
	public function getDescriptionVal()
	{
		return $this->getFieldValue("description");
	}

	/**
	 * Get Description field reference
	 * @return Field
	 */
	public function getDescriptionFld()
	{
		return $this->getField("description");
	}

	/**
	 * Get Description form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getDescriptionFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("description")->getFormElement($formElementOverride);
	}

	/**
	 * Set Record Status value
	 * @param mixed $value
	 * @return Role
	 * @throws InvalidForeignKeyValue
	 */
	public function setRecordStatusIdVal($value = null)
	{
		$this->setFieldValue("record_status_id", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Record Status value
	 * @return mixed
	 */
	public function getRecordStatusIdVal()
	{
		return $this->getFieldValue("record_status_id");
	}

	/**
	 * Get Record Status field reference
	 * @return Field
	 */
	public function getRecordStatusIdFld()
	{
		return $this->getField("record_status_id");
	}

	/**
	 * Get Record Status form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getRecordStatusIdFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("record_status_id")->getFormElement($formElementOverride);
	}

	/**
	 * Get RecordStatus Object
	 * @return \Lavdiu\DemoApp\RecordStatus
	 */
	public function getRecordStatusIdObj()
	{
		if (is_numeric($this->getRecordStatusIdVal())) {
			return new \Lavdiu\DemoApp\RecordStatus($this->getRecordStatusIdVal());
		} else {
			return new \Lavdiu\DemoApp\RecordStatus();
		}
	}

	/**
	 * Set Unique Name value
	 * @param mixed $value
	 * @return Role
	 * @throws InvalidForeignKeyValue
	 */
	public function setUniqueNameVal($value = null)
	{
		$this->setFieldValue("unique_name", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Unique Name value
	 * @return mixed
	 */
	public function getUniqueNameVal()
	{
		return $this->getFieldValue("unique_name");
	}

	/**
	 * Get Unique Name field reference
	 * @return Field
	 */
	public function getUniqueNameFld()
	{
		return $this->getField("unique_name");
	}

	/**
	 * Get Unique Name form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getUniqueNameFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("unique_name")->getFormElement($formElementOverride);
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
	 * @return Role[]
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

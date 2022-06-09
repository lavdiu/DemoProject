<?php

namespace Lavdiu\DemoApp\Base;

use Laf\Database;
use Laf\Database\Table;
use Laf\Database\Field\Field;
use Laf\Database\PrimaryKey;
use Laf\Database\ForeignKey;
use Laf\UI\Form\FormElementInterface;
use Laf\UI\ComponentInterface;
use Lavdiu\DemoApp\ChangeLog;
use Laf\Exception\InvalidForeignKeyValue;

/**
 * Class BaseChangeLog
 * @package Lavdiu\DemoApp\Base
 * Base Class for Table change_log
 * Basic definition of the fields and relationship with the Database Table change_log
 * This class will be auto-generated every time there is a schema change
 * Please do not add code here. Instead add your code at the main class one directory above
 */
class BaseChangeLog extends Database\BaseObject
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
		$this->setTable(new Table('change_log'));
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
			->setName("laf_schema_object")
			->setLabel("Laf Schema Object")
			->setPlaceHolder("Laf Schema Object")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("field_name")
			->setLabel("Field Name")
			->setPlaceHolder("Field Name")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("old_value")
			->setLabel("Old Value")
			->setPlaceHolder("Old Value")
			->setRequired(false)
			->setMaxLength(65535)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeText());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("new_value")
			->setLabel("New Value")
			->setPlaceHolder("New Value")
			->setRequired(false)
			->setMaxLength(65535)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeText());
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
			->setName("created_by")
			->setLabel("Created By")
			->setPlaceHolder("Created By")
			->setRequired(false)
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
				->setField($this->getTable()->getField("created_by"))
				->setKeyName('demoapp_change_log_person_fd_idx')
				->setReferencingTable("person")
				->setReferencingField("id")
		);

	}

	/**
	 * Set Id value
	 * @param mixed $value
	 * @return ChangeLog
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
	 * Set Laf Schema Object value
	 * @param mixed $value
	 * @return ChangeLog
	 * @throws InvalidForeignKeyValue
	 */
	public function setLafSchemaObjectVal($value = null)
	{
		$this->setFieldValue("laf_schema_object", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Laf Schema Object value
	 * @return mixed
	 */
	public function getLafSchemaObjectVal()
	{
		return $this->getFieldValue("laf_schema_object");
	}

	/**
	 * Get Laf Schema Object field reference
	 * @return Field
	 */
	public function getLafSchemaObjectFld()
	{
		return $this->getField("laf_schema_object");
	}

	/**
	 * Get Laf Schema Object form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getLafSchemaObjectFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("laf_schema_object")->getFormElement($formElementOverride);
	}

	/**
	 * Set Field Name value
	 * @param mixed $value
	 * @return ChangeLog
	 * @throws InvalidForeignKeyValue
	 */
	public function setFieldNameVal($value = null)
	{
		$this->setFieldValue("field_name", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Field Name value
	 * @return mixed
	 */
	public function getFieldNameVal()
	{
		return $this->getFieldValue("field_name");
	}

	/**
	 * Get Field Name field reference
	 * @return Field
	 */
	public function getFieldNameFld()
	{
		return $this->getField("field_name");
	}

	/**
	 * Get Field Name form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getFieldNameFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("field_name")->getFormElement($formElementOverride);
	}

	/**
	 * Set Old Value value
	 * @param mixed $value
	 * @return ChangeLog
	 * @throws InvalidForeignKeyValue
	 */
	public function setOldValueVal($value = null)
	{
		$this->setFieldValue("old_value", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Old Value value
	 * @return mixed
	 */
	public function getOldValueVal()
	{
		return $this->getFieldValue("old_value");
	}

	/**
	 * Get Old Value field reference
	 * @return Field
	 */
	public function getOldValueFld()
	{
		return $this->getField("old_value");
	}

	/**
	 * Get Old Value form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getOldValueFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("old_value")->getFormElement($formElementOverride);
	}

	/**
	 * Set New Value value
	 * @param mixed $value
	 * @return ChangeLog
	 * @throws InvalidForeignKeyValue
	 */
	public function setNewValueVal($value = null)
	{
		$this->setFieldValue("new_value", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get New Value value
	 * @return mixed
	 */
	public function getNewValueVal()
	{
		return $this->getFieldValue("new_value");
	}

	/**
	 * Get New Value field reference
	 * @return Field
	 */
	public function getNewValueFld()
	{
		return $this->getField("new_value");
	}

	/**
	 * Get New Value form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getNewValueFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("new_value")->getFormElement($formElementOverride);
	}

	/**
	 * Set Created On value
	 * @param mixed $value
	 * @return ChangeLog
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
	 * Set Created By value
	 * @param mixed $value
	 * @return ChangeLog
	 * @throws InvalidForeignKeyValue
	 */
	public function setCreatedByVal($value = null)
	{
		$this->setFieldValue("created_by", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Created By value
	 * @return mixed
	 */
	public function getCreatedByVal()
	{
		return $this->getFieldValue("created_by");
	}

	/**
	 * Get Created By field reference
	 * @return Field
	 */
	public function getCreatedByFld()
	{
		return $this->getField("created_by");
	}

	/**
	 * Get Created By form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getCreatedByFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("created_by")->getFormElement($formElementOverride);
	}

	/**
	 * Get Person Object
	 * @return \Lavdiu\DemoApp\Person
	 */
	public function getCreatedByObj()
	{
		if (is_numeric($this->getCreatedByVal())) {
			return new \Lavdiu\DemoApp\Person($this->getCreatedByVal());
		} else {
			return new \Lavdiu\DemoApp\Person();
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
	 * @return ChangeLog[]
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

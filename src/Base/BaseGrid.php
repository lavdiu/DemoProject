<?php

namespace Lavdiu\DemoApp\Base;

use Laf\Database;
use Laf\Database\Table;
use Laf\Database\Field\Field;
use Laf\Database\PrimaryKey;
use Laf\Database\ForeignKey;
use Laf\UI\Form\FormElementInterface;
use Laf\UI\ComponentInterface;
use Lavdiu\DemoApp\Grid;
use Laf\Exception\InvalidForeignKeyValue;

/**
 * Class BaseGrid
 * @package Lavdiu\DemoApp\Base
 * Base Class for Table grid
 * Basic definition of the fields and relationship with the Database Table grid
 * This class will be auto-generated every time there is a schema change
 * Please do not add code here. Instead add your code at the main class one directory above
 */
class BaseGrid extends Database\BaseObject
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
		$this->setTable(new Table('grid'));
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
			->setName("grid_name")
			->setLabel("Grid Name")
			->setPlaceHolder("Grid Name")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(true)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addUniqueField($field);
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("title")
			->setLabel("Title")
			->setPlaceHolder("Title")
			->setRequired(false)
			->setMaxLength(65535)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeText());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("params_list")
			->setLabel("Params List")
			->setPlaceHolder("Params List")
			->setRequired(false)
			->setMaxLength(4294967295)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeText());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("expected_params_count")
			->setLabel("Expected Params Count")
			->setPlaceHolder("Expected Params Count")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("column_list")
			->setLabel("Column List")
			->setPlaceHolder("Column List")
			->setRequired(false)
			->setMaxLength(4294967295)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeText());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("sql_query")
			->setLabel("Sql Query")
			->setPlaceHolder("Sql Query")
			->setRequired(false)
			->setMaxLength(65535)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeText());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("settings")
			->setLabel("Settings")
			->setPlaceHolder("Settings")
			->setRequired(false)
			->setMaxLength(65535)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeText());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("rows_per_page")
			->setLabel("Rows Per Page")
			->setPlaceHolder("Rows Per Page")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
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
			->setName("updated_by")
			->setLabel("Updated By")
			->setPlaceHolder("Updated By")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("updated_on")
			->setLabel("Updated On")
			->setPlaceHolder("Updated On")
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
				->setField($this->getTable()->getField("created_by"))
				->setKeyName('demoapp_grid_created_by_id_fk')
				->setReferencingTable("person")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("updated_by"))
				->setKeyName('demoapp_grid_updated_by_id_fk')
				->setReferencingTable("person")
				->setReferencingField("id")
		);

	}

	/**
	 * Set Id value
	 * @param mixed $value
	 * @return Grid
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
	 * Set Grid Name value
	 * @param mixed $value
	 * @return Grid
	 * @throws InvalidForeignKeyValue
	 */
	public function setGridNameVal($value = null)
	{
		$this->setFieldValue("grid_name", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Grid Name value
	 * @return mixed
	 */
	public function getGridNameVal()
	{
		return $this->getFieldValue("grid_name");
	}

	/**
	 * Get Grid Name field reference
	 * @return Field
	 */
	public function getGridNameFld()
	{
		return $this->getField("grid_name");
	}

	/**
	 * Get Grid Name form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getGridNameFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("grid_name")->getFormElement($formElementOverride);
	}

	/**
	 * Set Title value
	 * @param mixed $value
	 * @return Grid
	 * @throws InvalidForeignKeyValue
	 */
	public function setTitleVal($value = null)
	{
		$this->setFieldValue("title", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Title value
	 * @return mixed
	 */
	public function getTitleVal()
	{
		return $this->getFieldValue("title");
	}

	/**
	 * Get Title field reference
	 * @return Field
	 */
	public function getTitleFld()
	{
		return $this->getField("title");
	}

	/**
	 * Get Title form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getTitleFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("title")->getFormElement($formElementOverride);
	}

	/**
	 * Set Params List value
	 * @param mixed $value
	 * @return Grid
	 * @throws InvalidForeignKeyValue
	 */
	public function setParamsListVal($value = null)
	{
		$this->setFieldValue("params_list", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Params List value
	 * @return mixed
	 */
	public function getParamsListVal()
	{
		return $this->getFieldValue("params_list");
	}

	/**
	 * Get Params List field reference
	 * @return Field
	 */
	public function getParamsListFld()
	{
		return $this->getField("params_list");
	}

	/**
	 * Get Params List form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getParamsListFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("params_list")->getFormElement($formElementOverride);
	}

	/**
	 * Set Expected Params Count value
	 * @param mixed $value
	 * @return Grid
	 * @throws InvalidForeignKeyValue
	 */
	public function setExpectedParamsCountVal($value = null)
	{
		$this->setFieldValue("expected_params_count", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Expected Params Count value
	 * @return mixed
	 */
	public function getExpectedParamsCountVal()
	{
		return $this->getFieldValue("expected_params_count");
	}

	/**
	 * Get Expected Params Count field reference
	 * @return Field
	 */
	public function getExpectedParamsCountFld()
	{
		return $this->getField("expected_params_count");
	}

	/**
	 * Get Expected Params Count form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getExpectedParamsCountFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("expected_params_count")->getFormElement($formElementOverride);
	}

	/**
	 * Set Column List value
	 * @param mixed $value
	 * @return Grid
	 * @throws InvalidForeignKeyValue
	 */
	public function setColumnListVal($value = null)
	{
		$this->setFieldValue("column_list", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Column List value
	 * @return mixed
	 */
	public function getColumnListVal()
	{
		return $this->getFieldValue("column_list");
	}

	/**
	 * Get Column List field reference
	 * @return Field
	 */
	public function getColumnListFld()
	{
		return $this->getField("column_list");
	}

	/**
	 * Get Column List form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getColumnListFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("column_list")->getFormElement($formElementOverride);
	}

	/**
	 * Set Sql Query value
	 * @param mixed $value
	 * @return Grid
	 * @throws InvalidForeignKeyValue
	 */
	public function setSqlQueryVal($value = null)
	{
		$this->setFieldValue("sql_query", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Sql Query value
	 * @return mixed
	 */
	public function getSqlQueryVal()
	{
		return $this->getFieldValue("sql_query");
	}

	/**
	 * Get Sql Query field reference
	 * @return Field
	 */
	public function getSqlQueryFld()
	{
		return $this->getField("sql_query");
	}

	/**
	 * Get Sql Query form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getSqlQueryFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("sql_query")->getFormElement($formElementOverride);
	}

	/**
	 * Set Settings value
	 * @param mixed $value
	 * @return Grid
	 * @throws InvalidForeignKeyValue
	 */
	public function setSettingsVal($value = null)
	{
		$this->setFieldValue("settings", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Settings value
	 * @return mixed
	 */
	public function getSettingsVal()
	{
		return $this->getFieldValue("settings");
	}

	/**
	 * Get Settings field reference
	 * @return Field
	 */
	public function getSettingsFld()
	{
		return $this->getField("settings");
	}

	/**
	 * Get Settings form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getSettingsFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("settings")->getFormElement($formElementOverride);
	}

	/**
	 * Set Rows Per Page value
	 * @param mixed $value
	 * @return Grid
	 * @throws InvalidForeignKeyValue
	 */
	public function setRowsPerPageVal($value = null)
	{
		$this->setFieldValue("rows_per_page", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Rows Per Page value
	 * @return mixed
	 */
	public function getRowsPerPageVal()
	{
		return $this->getFieldValue("rows_per_page");
	}

	/**
	 * Get Rows Per Page field reference
	 * @return Field
	 */
	public function getRowsPerPageFld()
	{
		return $this->getField("rows_per_page");
	}

	/**
	 * Get Rows Per Page form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getRowsPerPageFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("rows_per_page")->getFormElement($formElementOverride);
	}

	/**
	 * Set Created By value
	 * @param mixed $value
	 * @return Grid
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
	 * Set Created On value
	 * @param mixed $value
	 * @return Grid
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
	 * Set Updated By value
	 * @param mixed $value
	 * @return Grid
	 * @throws InvalidForeignKeyValue
	 */
	public function setUpdatedByVal($value = null)
	{
		$this->setFieldValue("updated_by", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Updated By value
	 * @return mixed
	 */
	public function getUpdatedByVal()
	{
		return $this->getFieldValue("updated_by");
	}

	/**
	 * Get Updated By field reference
	 * @return Field
	 */
	public function getUpdatedByFld()
	{
		return $this->getField("updated_by");
	}

	/**
	 * Get Updated By form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getUpdatedByFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("updated_by")->getFormElement($formElementOverride);
	}

	/**
	 * Get Person Object
	 * @return \Lavdiu\DemoApp\Person
	 */
	public function getUpdatedByObj()
	{
		if (is_numeric($this->getUpdatedByVal())) {
			return new \Lavdiu\DemoApp\Person($this->getUpdatedByVal());
		} else {
			return new \Lavdiu\DemoApp\Person();
		}
	}

	/**
	 * Set Updated On value
	 * @param mixed $value
	 * @return Grid
	 * @throws InvalidForeignKeyValue
	 */
	public function setUpdatedOnVal($value = null)
	{
		$this->setFieldValue("updated_on", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Updated On value
	 * @return mixed
	 */
	public function getUpdatedOnVal()
	{
		return $this->getFieldValue("updated_on");
	}

	/**
	 * Get Updated On field reference
	 * @return Field
	 */
	public function getUpdatedOnFld()
	{
		return $this->getField("updated_on");
	}

	/**
	 * Get Updated On form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getUpdatedOnFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("updated_on")->getFormElement($formElementOverride);
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
	 * @return Grid[]
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

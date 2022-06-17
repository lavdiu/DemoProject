<?php

namespace Lavdiu\DemoApp\Base;

use Laf\Database;
use Laf\Database\Table;
use Laf\Database\Field\Field;
use Laf\Database\PrimaryKey;
use Laf\Database\ForeignKey;
use Laf\UI\Form\FormElementInterface;
use Laf\UI\ComponentInterface;
use Lavdiu\DemoApp\SqlError;
use Laf\Exception\InvalidForeignKeyValue;

/**
 * Class BaseSqlError
 * @package Lavdiu\DemoApp\Base
 * Base Class for Table sql_error
 * Basic definition of the fields and relationship with the Database Table sql_error
 * This class will be auto-generated every time there is a schema change
 * Please do not add code here. Instead add your code at the main class one directory above
 */
class BaseSqlError extends Database\BaseObject
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
		$this->setTable(new Table('sql_error'));
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
			->setName("error_message")
			->setLabel("Error Message")
			->setPlaceHolder("Error Message")
			->setRequired(false)
			->setMaxLength(65535)
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
			->setName("exception_trace")
			->setLabel("Exception Trace")
			->setPlaceHolder("Exception Trace")
			->setRequired(false)
			->setMaxLength(65535)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeText());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("page_file")
			->setLabel("Page File")
			->setPlaceHolder("Page File")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("line_number")
			->setLabel("Line Number")
			->setPlaceHolder("Line Number")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
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

		$this->getTable()->setPrimaryKey($pk);

		/**
		 * Generating Foreign keys
		 */
	}

	/**
	 * Set Id value
	 * @param mixed $value
	 * @return SqlError
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
	 * Set Error Message value
	 * @param mixed $value
	 * @return SqlError
	 * @throws InvalidForeignKeyValue
	 */
	public function setErrorMessageVal($value = null)
	{
		$this->setFieldValue("error_message", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Error Message value
	 * @return mixed
	 */
	public function getErrorMessageVal()
	{
		return $this->getFieldValue("error_message");
	}

	/**
	 * Get Error Message field reference
	 * @return Field
	 */
	public function getErrorMessageFld()
	{
		return $this->getField("error_message");
	}

	/**
	 * Get Error Message form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getErrorMessageFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("error_message")->getFormElement($formElementOverride);
	}

	/**
	 * Set Sql Query value
	 * @param mixed $value
	 * @return SqlError
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
	 * Set Exception Trace value
	 * @param mixed $value
	 * @return SqlError
	 * @throws InvalidForeignKeyValue
	 */
	public function setExceptionTraceVal($value = null)
	{
		$this->setFieldValue("exception_trace", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Exception Trace value
	 * @return mixed
	 */
	public function getExceptionTraceVal()
	{
		return $this->getFieldValue("exception_trace");
	}

	/**
	 * Get Exception Trace field reference
	 * @return Field
	 */
	public function getExceptionTraceFld()
	{
		return $this->getField("exception_trace");
	}

	/**
	 * Get Exception Trace form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getExceptionTraceFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("exception_trace")->getFormElement($formElementOverride);
	}

	/**
	 * Set Page File value
	 * @param mixed $value
	 * @return SqlError
	 * @throws InvalidForeignKeyValue
	 */
	public function setPageFileVal($value = null)
	{
		$this->setFieldValue("page_file", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Page File value
	 * @return mixed
	 */
	public function getPageFileVal()
	{
		return $this->getFieldValue("page_file");
	}

	/**
	 * Get Page File field reference
	 * @return Field
	 */
	public function getPageFileFld()
	{
		return $this->getField("page_file");
	}

	/**
	 * Get Page File form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getPageFileFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("page_file")->getFormElement($formElementOverride);
	}

	/**
	 * Set Line Number value
	 * @param mixed $value
	 * @return SqlError
	 * @throws InvalidForeignKeyValue
	 */
	public function setLineNumberVal($value = null)
	{
		$this->setFieldValue("line_number", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Line Number value
	 * @return mixed
	 */
	public function getLineNumberVal()
	{
		return $this->getFieldValue("line_number");
	}

	/**
	 * Get Line Number field reference
	 * @return Field
	 */
	public function getLineNumberFld()
	{
		return $this->getField("line_number");
	}

	/**
	 * Get Line Number form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getLineNumberFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("line_number")->getFormElement($formElementOverride);
	}

	/**
	 * Set Person value
	 * @param mixed $value
	 * @return SqlError
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
	 * Set Created On value
	 * @param mixed $value
	 * @return SqlError
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
	 * @return SqlError[]
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

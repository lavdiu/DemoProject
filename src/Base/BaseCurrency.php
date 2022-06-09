<?php

namespace Lavdiu\DemoApp\Base;

use Laf\Database;
use Laf\Database\Table;
use Laf\Database\Field\Field;
use Laf\Database\PrimaryKey;
use Laf\Database\ForeignKey;
use Laf\UI\Form\FormElementInterface;
use Laf\UI\ComponentInterface;
use Lavdiu\DemoApp\Currency;
use Laf\Exception\InvalidForeignKeyValue;

/**
 * Class BaseCurrency
 * @package Lavdiu\DemoApp\Base
 * Base Class for Table currency
 * Basic definition of the fields and relationship with the Database Table currency
 * This class will be auto-generated every time there is a schema change
 * Please do not add code here. Instead add your code at the main class one directory above
 */
class BaseCurrency extends Database\BaseObject
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
		$this->setTable(new Table('currency'));
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
			->setName("Code")
			->setLabel("Code")
			->setPlaceHolder("Code")
			->setRequired(false)
			->setMaxLength(3)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeText());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("description")
			->setLabel("Description")
			->setPlaceHolder("Description")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("IsFund")
			->setLabel("IsFund")
			->setPlaceHolder("IsFund")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeBool());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("IsComplimentary")
			->setLabel("IsComplimentary")
			->setPlaceHolder("IsComplimentary")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeBool());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("IsMetal")
			->setLabel("IsMetal")
			->setPlaceHolder("IsMetal")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeBool());
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
	 * @return Currency
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
	 * Set Code value
	 * @param mixed $value
	 * @return Currency
	 * @throws InvalidForeignKeyValue
	 */
	public function setCodeVal($value = null)
	{
		$this->setFieldValue("Code", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Code value
	 * @return mixed
	 */
	public function getCodeVal()
	{
		return $this->getFieldValue("Code");
	}

	/**
	 * Get Code field reference
	 * @return Field
	 */
	public function getCodeFld()
	{
		return $this->getField("Code");
	}

	/**
	 * Get Code form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getCodeFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("Code")->getFormElement($formElementOverride);
	}

	/**
	 * Set Description value
	 * @param mixed $value
	 * @return Currency
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
	 * Set IsFund value
	 * @param mixed $value
	 * @return Currency
	 * @throws InvalidForeignKeyValue
	 */
	public function setIsFundVal($value = null)
	{
		$this->setFieldValue("IsFund", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get IsFund value
	 * @return mixed
	 */
	public function getIsFundVal()
	{
		return $this->getFieldValue("IsFund");
	}

	/**
	 * Get IsFund field reference
	 * @return Field
	 */
	public function getIsFundFld()
	{
		return $this->getField("IsFund");
	}

	/**
	 * Get IsFund form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getIsFundFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("IsFund")->getFormElement($formElementOverride);
	}

	/**
	 * Set IsComplimentary value
	 * @param mixed $value
	 * @return Currency
	 * @throws InvalidForeignKeyValue
	 */
	public function setIsComplimentaryVal($value = null)
	{
		$this->setFieldValue("IsComplimentary", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get IsComplimentary value
	 * @return mixed
	 */
	public function getIsComplimentaryVal()
	{
		return $this->getFieldValue("IsComplimentary");
	}

	/**
	 * Get IsComplimentary field reference
	 * @return Field
	 */
	public function getIsComplimentaryFld()
	{
		return $this->getField("IsComplimentary");
	}

	/**
	 * Get IsComplimentary form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getIsComplimentaryFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("IsComplimentary")->getFormElement($formElementOverride);
	}

	/**
	 * Set IsMetal value
	 * @param mixed $value
	 * @return Currency
	 * @throws InvalidForeignKeyValue
	 */
	public function setIsMetalVal($value = null)
	{
		$this->setFieldValue("IsMetal", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get IsMetal value
	 * @return mixed
	 */
	public function getIsMetalVal()
	{
		return $this->getFieldValue("IsMetal");
	}

	/**
	 * Get IsMetal field reference
	 * @return Field
	 */
	public function getIsMetalFld()
	{
		return $this->getField("IsMetal");
	}

	/**
	 * Get IsMetal form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getIsMetalFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("IsMetal")->getFormElement($formElementOverride);
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
	 * @return Currency[]
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

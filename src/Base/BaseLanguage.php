<?php

namespace Lavdiu\DemoApp\Base;

use Laf\Database;
use Laf\Database\Table;
use Laf\Database\Field\Field;
use Laf\Database\PrimaryKey;
use Laf\Database\ForeignKey;
use Laf\UI\Form\FormElementInterface;
use Laf\UI\ComponentInterface;
use Lavdiu\DemoApp\Language;
use Laf\Exception\InvalidForeignKeyValue;

/**
 * Class BaseLanguage
 * @package Lavdiu\DemoApp\Base
 * Base Class for Table language
 * Basic definition of the fields and relationship with the Database Table language
 * This class will be auto-generated every time there is a schema change
 * Please do not add code here. Instead add your code at the main class one directory above
 */
class BaseLanguage extends Database\BaseObject
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
		$this->setTable(new Table('language'));
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
			->setName("description")
			->setLabel("Description")
			->setPlaceHolder("Description")
			->setRequired(false)
			->setMaxLength(51)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("native")
			->setLabel("Native")
			->setPlaceHolder("Native")
			->setRequired(false)
			->setMaxLength(57)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("iso6391")
			->setLabel("Iso6391")
			->setPlaceHolder("Iso6391")
			->setRequired(false)
			->setMaxLength(2)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("iso6392T")
			->setLabel("Iso6392T")
			->setPlaceHolder("Iso6392T")
			->setRequired(false)
			->setMaxLength(3)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("iso6392b")
			->setLabel("Iso6392b")
			->setPlaceHolder("Iso6392b")
			->setRequired(false)
			->setMaxLength(3)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("iso6393")
			->setLabel("Iso6393")
			->setPlaceHolder("Iso6393")
			->setRequired(false)
			->setMaxLength(5)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("iso6396")
			->setLabel("Iso6396")
			->setPlaceHolder("Iso6396")
			->setRequired(false)
			->setMaxLength(4)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
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
	 * @return Language
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
	 * Set Description value
	 * @param mixed $value
	 * @return Language
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
	 * Set Native value
	 * @param mixed $value
	 * @return Language
	 * @throws InvalidForeignKeyValue
	 */
	public function setNativeVal($value = null)
	{
		$this->setFieldValue("native", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Native value
	 * @return mixed
	 */
	public function getNativeVal()
	{
		return $this->getFieldValue("native");
	}

	/**
	 * Get Native field reference
	 * @return Field
	 */
	public function getNativeFld()
	{
		return $this->getField("native");
	}

	/**
	 * Get Native form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getNativeFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("native")->getFormElement($formElementOverride);
	}

	/**
	 * Set Iso6391 value
	 * @param mixed $value
	 * @return Language
	 * @throws InvalidForeignKeyValue
	 */
	public function setIso6391Val($value = null)
	{
		$this->setFieldValue("iso6391", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Iso6391 value
	 * @return mixed
	 */
	public function getIso6391Val()
	{
		return $this->getFieldValue("iso6391");
	}

	/**
	 * Get Iso6391 field reference
	 * @return Field
	 */
	public function getIso6391Fld()
	{
		return $this->getField("iso6391");
	}

	/**
	 * Get Iso6391 form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getIso6391FormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("iso6391")->getFormElement($formElementOverride);
	}

	/**
	 * Set Iso6392T value
	 * @param mixed $value
	 * @return Language
	 * @throws InvalidForeignKeyValue
	 */
	public function setIso6392TVal($value = null)
	{
		$this->setFieldValue("iso6392T", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Iso6392T value
	 * @return mixed
	 */
	public function getIso6392TVal()
	{
		return $this->getFieldValue("iso6392T");
	}

	/**
	 * Get Iso6392T field reference
	 * @return Field
	 */
	public function getIso6392TFld()
	{
		return $this->getField("iso6392T");
	}

	/**
	 * Get Iso6392T form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getIso6392TFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("iso6392T")->getFormElement($formElementOverride);
	}

	/**
	 * Set Iso6392b value
	 * @param mixed $value
	 * @return Language
	 * @throws InvalidForeignKeyValue
	 */
	public function setIso6392bVal($value = null)
	{
		$this->setFieldValue("iso6392b", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Iso6392b value
	 * @return mixed
	 */
	public function getIso6392bVal()
	{
		return $this->getFieldValue("iso6392b");
	}

	/**
	 * Get Iso6392b field reference
	 * @return Field
	 */
	public function getIso6392bFld()
	{
		return $this->getField("iso6392b");
	}

	/**
	 * Get Iso6392b form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getIso6392bFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("iso6392b")->getFormElement($formElementOverride);
	}

	/**
	 * Set Iso6393 value
	 * @param mixed $value
	 * @return Language
	 * @throws InvalidForeignKeyValue
	 */
	public function setIso6393Val($value = null)
	{
		$this->setFieldValue("iso6393", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Iso6393 value
	 * @return mixed
	 */
	public function getIso6393Val()
	{
		return $this->getFieldValue("iso6393");
	}

	/**
	 * Get Iso6393 field reference
	 * @return Field
	 */
	public function getIso6393Fld()
	{
		return $this->getField("iso6393");
	}

	/**
	 * Get Iso6393 form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getIso6393FormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("iso6393")->getFormElement($formElementOverride);
	}

	/**
	 * Set Iso6396 value
	 * @param mixed $value
	 * @return Language
	 * @throws InvalidForeignKeyValue
	 */
	public function setIso6396Val($value = null)
	{
		$this->setFieldValue("iso6396", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Iso6396 value
	 * @return mixed
	 */
	public function getIso6396Val()
	{
		return $this->getFieldValue("iso6396");
	}

	/**
	 * Get Iso6396 field reference
	 * @return Field
	 */
	public function getIso6396Fld()
	{
		return $this->getField("iso6396");
	}

	/**
	 * Get Iso6396 form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getIso6396FormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("iso6396")->getFormElement($formElementOverride);
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
	 * @return Language[]
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

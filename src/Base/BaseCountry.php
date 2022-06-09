<?php

namespace Lavdiu\DemoApp\Base;

use Laf\Database;
use Laf\Database\Table;
use Laf\Database\Field\Field;
use Laf\Database\PrimaryKey;
use Laf\Database\ForeignKey;
use Laf\UI\Form\FormElementInterface;
use Laf\UI\ComponentInterface;
use Lavdiu\DemoApp\Country;
use Laf\Exception\InvalidForeignKeyValue;

/**
 * Class BaseCountry
 * @package Lavdiu\DemoApp\Base
 * Base Class for Table country
 * Basic definition of the fields and relationship with the Database Table country
 * This class will be auto-generated every time there is a schema change
 * Please do not add code here. Instead add your code at the main class one directory above
 */
class BaseCountry extends Database\BaseObject
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
		$this->setTable(new Table('country'));
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
			->setName("iso")
			->setLabel("Iso")
			->setPlaceHolder("Iso")
			->setRequired(true)
			->setMaxLength(2)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeText());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("label")
			->setLabel("Label")
			->setPlaceHolder("Label")
			->setRequired(true)
			->setMaxLength(80)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->setDisplayField($field);
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("iso3")
			->setLabel("Iso3")
			->setPlaceHolder("Iso3")
			->setRequired(false)
			->setMaxLength(3)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeText());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("numcode")
			->setLabel("Numcode")
			->setPlaceHolder("Numcode")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("phonecode")
			->setLabel("Phonecode")
			->setPlaceHolder("Phonecode")
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
	}

	/**
	 * Set Id value
	 * @param mixed $value
	 * @return Country
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
	 * Set Iso value
	 * @param mixed $value
	 * @return Country
	 * @throws InvalidForeignKeyValue
	 */
	public function setIsoVal($value = null)
	{
		$this->setFieldValue("iso", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Iso value
	 * @return mixed
	 */
	public function getIsoVal()
	{
		return $this->getFieldValue("iso");
	}

	/**
	 * Get Iso field reference
	 * @return Field
	 */
	public function getIsoFld()
	{
		return $this->getField("iso");
	}

	/**
	 * Get Iso form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getIsoFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("iso")->getFormElement($formElementOverride);
	}

	/**
	 * Set Label value
	 * @param mixed $value
	 * @return Country
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
	 * Set Iso3 value
	 * @param mixed $value
	 * @return Country
	 * @throws InvalidForeignKeyValue
	 */
	public function setIso3Val($value = null)
	{
		$this->setFieldValue("iso3", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Iso3 value
	 * @return mixed
	 */
	public function getIso3Val()
	{
		return $this->getFieldValue("iso3");
	}

	/**
	 * Get Iso3 field reference
	 * @return Field
	 */
	public function getIso3Fld()
	{
		return $this->getField("iso3");
	}

	/**
	 * Get Iso3 form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getIso3FormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("iso3")->getFormElement($formElementOverride);
	}

	/**
	 * Set Numcode value
	 * @param mixed $value
	 * @return Country
	 * @throws InvalidForeignKeyValue
	 */
	public function setNumcodeVal($value = null)
	{
		$this->setFieldValue("numcode", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Numcode value
	 * @return mixed
	 */
	public function getNumcodeVal()
	{
		return $this->getFieldValue("numcode");
	}

	/**
	 * Get Numcode field reference
	 * @return Field
	 */
	public function getNumcodeFld()
	{
		return $this->getField("numcode");
	}

	/**
	 * Get Numcode form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getNumcodeFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("numcode")->getFormElement($formElementOverride);
	}

	/**
	 * Set Phonecode value
	 * @param mixed $value
	 * @return Country
	 * @throws InvalidForeignKeyValue
	 */
	public function setPhonecodeVal($value = null)
	{
		$this->setFieldValue("phonecode", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Phonecode value
	 * @return mixed
	 */
	public function getPhonecodeVal()
	{
		return $this->getFieldValue("phonecode");
	}

	/**
	 * Get Phonecode field reference
	 * @return Field
	 */
	public function getPhonecodeFld()
	{
		return $this->getField("phonecode");
	}

	/**
	 * Get Phonecode form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getPhonecodeFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("phonecode")->getFormElement($formElementOverride);
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
	 * @return Country[]
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

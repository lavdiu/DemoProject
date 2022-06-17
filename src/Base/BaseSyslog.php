<?php

namespace Lavdiu\DemoApp\Base;

use Laf\Database;
use Laf\Database\Table;
use Laf\Database\Field\Field;
use Laf\Database\PrimaryKey;
use Laf\Database\ForeignKey;
use Laf\UI\Form\FormElementInterface;
use Laf\UI\ComponentInterface;
use Lavdiu\DemoApp\Syslog;
use Laf\Exception\InvalidForeignKeyValue;

/**
 * Class BaseSyslog
 * @package Lavdiu\DemoApp\Base
 * Base Class for Table syslog
 * Basic definition of the fields and relationship with the Database Table syslog
 * This class will be auto-generated every time there is a schema change
 * Please do not add code here. Instead add your code at the main class one directory above
 */
class BaseSyslog extends Database\BaseObject
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
		$this->setTable(new Table('syslog'));
		/**
		 * Generate field data
		 */
		$pk = new PrimaryKey();
		$field = (new Field())
			->setName("syslogid")
			->setLabel("Syslogid")
			->setPlaceHolder("Syslogid")
			->setRequired(true)
			->setMaxLength(255)
			->setAutoIncrement(true)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$pk->addField($field);
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("grupi")
			->setLabel("Grupi")
			->setPlaceHolder("Grupi")
			->setRequired(false)
			->setMaxLength(50)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("nengrupi")
			->setLabel("Nengrupi")
			->setPlaceHolder("Nengrupi")
			->setRequired(false)
			->setMaxLength(50)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("useri")
			->setLabel("Useri")
			->setPlaceHolder("Useri")
			->setRequired(true)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("data")
			->setLabel("Data")
			->setPlaceHolder("Data")
			->setRequired(true)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("veprimi")
			->setLabel("Veprimi")
			->setPlaceHolder("Veprimi")
			->setRequired(true)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("ip")
			->setLabel("Ip")
			->setPlaceHolder("Ip")
			->setRequired(false)
			->setMaxLength(45)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("browser")
			->setLabel("Browser")
			->setPlaceHolder("Browser")
			->setRequired(false)
			->setMaxLength(65535)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeText());
		$this->getTable()->addField($field);
		$field = null;

		$this->getTable()->setPrimaryKey($pk);

		/**
		 * Generating Foreign keys
		 */
	}

	/**
	 * Set Syslogid value
	 * @param mixed $value
	 * @return Syslog
	 * @throws InvalidForeignKeyValue
	 */
	public function setSyslogidVal($value = null)
	{
		$this->setFieldValue("syslogid", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Syslogid value
	 * @return mixed
	 */
	public function getSyslogidVal()
	{
		return $this->getFieldValue("syslogid");
	}

	/**
	 * Get Syslogid field reference
	 * @return Field
	 */
	public function getSyslogidFld()
	{
		return $this->getField("syslogid");
	}

	/**
	 * Get Syslogid form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getSyslogidFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("syslogid")->getFormElement($formElementOverride);
	}

	/**
	 * Set Grupi value
	 * @param mixed $value
	 * @return Syslog
	 * @throws InvalidForeignKeyValue
	 */
	public function setGrupiVal($value = null)
	{
		$this->setFieldValue("grupi", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Grupi value
	 * @return mixed
	 */
	public function getGrupiVal()
	{
		return $this->getFieldValue("grupi");
	}

	/**
	 * Get Grupi field reference
	 * @return Field
	 */
	public function getGrupiFld()
	{
		return $this->getField("grupi");
	}

	/**
	 * Get Grupi form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getGrupiFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("grupi")->getFormElement($formElementOverride);
	}

	/**
	 * Set Nengrupi value
	 * @param mixed $value
	 * @return Syslog
	 * @throws InvalidForeignKeyValue
	 */
	public function setNengrupiVal($value = null)
	{
		$this->setFieldValue("nengrupi", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Nengrupi value
	 * @return mixed
	 */
	public function getNengrupiVal()
	{
		return $this->getFieldValue("nengrupi");
	}

	/**
	 * Get Nengrupi field reference
	 * @return Field
	 */
	public function getNengrupiFld()
	{
		return $this->getField("nengrupi");
	}

	/**
	 * Get Nengrupi form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getNengrupiFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("nengrupi")->getFormElement($formElementOverride);
	}

	/**
	 * Set Useri value
	 * @param mixed $value
	 * @return Syslog
	 * @throws InvalidForeignKeyValue
	 */
	public function setUseriVal($value = null)
	{
		$this->setFieldValue("useri", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Useri value
	 * @return mixed
	 */
	public function getUseriVal()
	{
		return $this->getFieldValue("useri");
	}

	/**
	 * Get Useri field reference
	 * @return Field
	 */
	public function getUseriFld()
	{
		return $this->getField("useri");
	}

	/**
	 * Get Useri form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getUseriFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("useri")->getFormElement($formElementOverride);
	}

	/**
	 * Set Data value
	 * @param mixed $value
	 * @return Syslog
	 * @throws InvalidForeignKeyValue
	 */
	public function setDataVal($value = null)
	{
		$this->setFieldValue("data", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Data value
	 * @return mixed
	 */
	public function getDataVal()
	{
		return $this->getFieldValue("data");
	}

	/**
	 * Get Data field reference
	 * @return Field
	 */
	public function getDataFld()
	{
		return $this->getField("data");
	}

	/**
	 * Get Data form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getDataFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("data")->getFormElement($formElementOverride);
	}

	/**
	 * Set Veprimi value
	 * @param mixed $value
	 * @return Syslog
	 * @throws InvalidForeignKeyValue
	 */
	public function setVeprimiVal($value = null)
	{
		$this->setFieldValue("veprimi", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Veprimi value
	 * @return mixed
	 */
	public function getVeprimiVal()
	{
		return $this->getFieldValue("veprimi");
	}

	/**
	 * Get Veprimi field reference
	 * @return Field
	 */
	public function getVeprimiFld()
	{
		return $this->getField("veprimi");
	}

	/**
	 * Get Veprimi form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getVeprimiFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("veprimi")->getFormElement($formElementOverride);
	}

	/**
	 * Set Ip value
	 * @param mixed $value
	 * @return Syslog
	 * @throws InvalidForeignKeyValue
	 */
	public function setIpVal($value = null)
	{
		$this->setFieldValue("ip", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Ip value
	 * @return mixed
	 */
	public function getIpVal()
	{
		return $this->getFieldValue("ip");
	}

	/**
	 * Get Ip field reference
	 * @return Field
	 */
	public function getIpFld()
	{
		return $this->getField("ip");
	}

	/**
	 * Get Ip form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getIpFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("ip")->getFormElement($formElementOverride);
	}

	/**
	 * Set Browser value
	 * @param mixed $value
	 * @return Syslog
	 * @throws InvalidForeignKeyValue
	 */
	public function setBrowserVal($value = null)
	{
		$this->setFieldValue("browser", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Browser value
	 * @return mixed
	 */
	public function getBrowserVal()
	{
		return $this->getFieldValue("browser");
	}

	/**
	 * Get Browser field reference
	 * @return Field
	 */
	public function getBrowserFld()
	{
		return $this->getField("browser");
	}

	/**
	 * Get Browser form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getBrowserFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("browser")->getFormElement($formElementOverride);
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
	 * @return Syslog[]
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

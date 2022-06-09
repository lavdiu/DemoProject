<?php

namespace Lavdiu\DemoApp\Base;

use Laf\Database;
use Laf\Database\Table;
use Laf\Database\Field\Field;
use Laf\Database\PrimaryKey;
use Laf\Database\ForeignKey;
use Laf\UI\Form\FormElementInterface;
use Laf\UI\ComponentInterface;
use Lavdiu\DemoApp\EmailAttachment;
use Laf\Exception\InvalidForeignKeyValue;

/**
 * Class BaseEmailAttachment
 * @package Lavdiu\DemoApp\Base
 * Base Class for Table email_attachment
 * Basic definition of the fields and relationship with the Database Table email_attachment
 * This class will be auto-generated every time there is a schema change
 * Please do not add code here. Instead add your code at the main class one directory above
 */
class BaseEmailAttachment extends Database\BaseObject
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
		$this->setTable(new Table('email_attachment'));
		/**
		 * Generate field data
		 */
		$pk = new PrimaryKey();
		$field = (new Field())
			->setName("email_id")
			->setLabel("Email")
			->setPlaceHolder("Email")
			->setRequired(true)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$pk->addField($field);
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("document_id")
			->setLabel("Document")
			->setPlaceHolder("Document")
			->setRequired(true)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$pk->addField($field);
		$this->getTable()->addField($field);
		$field = null;

		$this->getTable()->setPrimaryKey($pk);

		/**
		 * Generating Foreign keys
		 */
		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("email_id"))
				->setKeyName('email_attachment_fk2')
				->setReferencingTable("email")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("document_id"))
				->setKeyName('email_attachment_fk1')
				->setReferencingTable("document")
				->setReferencingField("id")
		);

	}

	/**
	 * Set Email value
	 * @param mixed $value
	 * @return EmailAttachment
	 * @throws InvalidForeignKeyValue
	 */
	public function setEmailIdVal($value = null)
	{
		$this->setFieldValue("email_id", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Email value
	 * @return mixed
	 */
	public function getEmailIdVal()
	{
		return $this->getFieldValue("email_id");
	}

	/**
	 * Get Email field reference
	 * @return Field
	 */
	public function getEmailIdFld()
	{
		return $this->getField("email_id");
	}

	/**
	 * Get Email form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getEmailIdFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("email_id")->getFormElement($formElementOverride);
	}

	/**
	 * Get Email Object
	 * @return \Lavdiu\DemoApp\Email
	 */
	public function getEmailIdObj()
	{
		if (is_numeric($this->getEmailIdVal())) {
			return new \Lavdiu\DemoApp\Email($this->getEmailIdVal());
		} else {
			return new \Lavdiu\DemoApp\Email();
		}
	}

	/**
	 * Set Document value
	 * @param mixed $value
	 * @return EmailAttachment
	 * @throws InvalidForeignKeyValue
	 */
	public function setDocumentIdVal($value = null)
	{
		$this->setFieldValue("document_id", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Document value
	 * @return mixed
	 */
	public function getDocumentIdVal()
	{
		return $this->getFieldValue("document_id");
	}

	/**
	 * Get Document field reference
	 * @return Field
	 */
	public function getDocumentIdFld()
	{
		return $this->getField("document_id");
	}

	/**
	 * Get Document form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getDocumentIdFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("document_id")->getFormElement($formElementOverride);
	}

	/**
	 * Get Document Object
	 * @return \Lavdiu\DemoApp\Document
	 */
	public function getDocumentIdObj()
	{
		if (is_numeric($this->getDocumentIdVal())) {
			return new \Lavdiu\DemoApp\Document($this->getDocumentIdVal());
		} else {
			return new \Lavdiu\DemoApp\Document();
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
	 * @return EmailAttachment[]
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

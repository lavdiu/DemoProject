<?php

namespace Lavdiu\DemoApp\Base;

use Laf\Database;
use Laf\Database\Table;
use Laf\Database\Field\Field;
use Laf\Database\PrimaryKey;
use Laf\Database\ForeignKey;
use Laf\UI\Form\FormElementInterface;
use Laf\UI\ComponentInterface;
use Lavdiu\DemoApp\Email;
use Laf\Exception\InvalidForeignKeyValue;

/**
 * Class BaseEmail
 * @package Lavdiu\DemoApp\Base
 * Base Class for Table email
 * Basic definition of the fields and relationship with the Database Table email
 * This class will be auto-generated every time there is a schema change
 * Please do not add code here. Instead add your code at the main class one directory above
 */
class BaseEmail extends Database\BaseObject
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
		$this->setTable(new Table('email'));
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
			->setName("email_from")
			->setLabel("Email From")
			->setPlaceHolder("Email From")
			->setRequired(false)
			->setMaxLength(65535)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeText());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("email_to")
			->setLabel("Email To")
			->setPlaceHolder("Email To")
			->setRequired(false)
			->setMaxLength(65535)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeText());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("email_cc")
			->setLabel("Email Cc")
			->setPlaceHolder("Email Cc")
			->setRequired(false)
			->setMaxLength(65535)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeText());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("email_bcc")
			->setLabel("Email Bcc")
			->setPlaceHolder("Email Bcc")
			->setRequired(false)
			->setMaxLength(65535)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeText());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("subject")
			->setLabel("Subject")
			->setPlaceHolder("Subject")
			->setRequired(false)
			->setMaxLength(65535)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeText());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("body")
			->setLabel("Body")
			->setPlaceHolder("Body")
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

		$field = (new Field())
			->setName("sent_on")
			->setLabel("Sent On")
			->setPlaceHolder("Sent On")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeDateTime());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("ref_hash")
			->setLabel("Ref Hash")
			->setPlaceHolder("Ref Hash")
			->setRequired(false)
			->setMaxLength(100)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$this->getTable()->setPrimaryKey($pk);

		/**
		 * Generating Foreign keys
		 */
		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("created_by"))
				->setKeyName('demoapp_lafemail_creator_fk_idx')
				->setReferencingTable("person")
				->setReferencingField("id")
		);

	}

	/**
	 * Set Id value
	 * @param mixed $value
	 * @return Email
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
	 * Set Email From value
	 * @param mixed $value
	 * @return Email
	 * @throws InvalidForeignKeyValue
	 */
	public function setEmailFromVal($value = null)
	{
		$this->setFieldValue("email_from", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Email From value
	 * @return mixed
	 */
	public function getEmailFromVal()
	{
		return $this->getFieldValue("email_from");
	}

	/**
	 * Get Email From field reference
	 * @return Field
	 */
	public function getEmailFromFld()
	{
		return $this->getField("email_from");
	}

	/**
	 * Get Email From form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getEmailFromFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("email_from")->getFormElement($formElementOverride);
	}

	/**
	 * Set Email To value
	 * @param mixed $value
	 * @return Email
	 * @throws InvalidForeignKeyValue
	 */
	public function setEmailToVal($value = null)
	{
		$this->setFieldValue("email_to", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Email To value
	 * @return mixed
	 */
	public function getEmailToVal()
	{
		return $this->getFieldValue("email_to");
	}

	/**
	 * Get Email To field reference
	 * @return Field
	 */
	public function getEmailToFld()
	{
		return $this->getField("email_to");
	}

	/**
	 * Get Email To form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getEmailToFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("email_to")->getFormElement($formElementOverride);
	}

	/**
	 * Set Email Cc value
	 * @param mixed $value
	 * @return Email
	 * @throws InvalidForeignKeyValue
	 */
	public function setEmailCcVal($value = null)
	{
		$this->setFieldValue("email_cc", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Email Cc value
	 * @return mixed
	 */
	public function getEmailCcVal()
	{
		return $this->getFieldValue("email_cc");
	}

	/**
	 * Get Email Cc field reference
	 * @return Field
	 */
	public function getEmailCcFld()
	{
		return $this->getField("email_cc");
	}

	/**
	 * Get Email Cc form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getEmailCcFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("email_cc")->getFormElement($formElementOverride);
	}

	/**
	 * Set Email Bcc value
	 * @param mixed $value
	 * @return Email
	 * @throws InvalidForeignKeyValue
	 */
	public function setEmailBccVal($value = null)
	{
		$this->setFieldValue("email_bcc", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Email Bcc value
	 * @return mixed
	 */
	public function getEmailBccVal()
	{
		return $this->getFieldValue("email_bcc");
	}

	/**
	 * Get Email Bcc field reference
	 * @return Field
	 */
	public function getEmailBccFld()
	{
		return $this->getField("email_bcc");
	}

	/**
	 * Get Email Bcc form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getEmailBccFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("email_bcc")->getFormElement($formElementOverride);
	}

	/**
	 * Set Subject value
	 * @param mixed $value
	 * @return Email
	 * @throws InvalidForeignKeyValue
	 */
	public function setSubjectVal($value = null)
	{
		$this->setFieldValue("subject", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Subject value
	 * @return mixed
	 */
	public function getSubjectVal()
	{
		return $this->getFieldValue("subject");
	}

	/**
	 * Get Subject field reference
	 * @return Field
	 */
	public function getSubjectFld()
	{
		return $this->getField("subject");
	}

	/**
	 * Get Subject form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getSubjectFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("subject")->getFormElement($formElementOverride);
	}

	/**
	 * Set Body value
	 * @param mixed $value
	 * @return Email
	 * @throws InvalidForeignKeyValue
	 */
	public function setBodyVal($value = null)
	{
		$this->setFieldValue("body", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Body value
	 * @return mixed
	 */
	public function getBodyVal()
	{
		return $this->getFieldValue("body");
	}

	/**
	 * Get Body field reference
	 * @return Field
	 */
	public function getBodyFld()
	{
		return $this->getField("body");
	}

	/**
	 * Get Body form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getBodyFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("body")->getFormElement($formElementOverride);
	}

	/**
	 * Set Created On value
	 * @param mixed $value
	 * @return Email
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
	 * @return Email
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
	 * Set Sent On value
	 * @param mixed $value
	 * @return Email
	 * @throws InvalidForeignKeyValue
	 */
	public function setSentOnVal($value = null)
	{
		$this->setFieldValue("sent_on", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Sent On value
	 * @return mixed
	 */
	public function getSentOnVal()
	{
		return $this->getFieldValue("sent_on");
	}

	/**
	 * Get Sent On field reference
	 * @return Field
	 */
	public function getSentOnFld()
	{
		return $this->getField("sent_on");
	}

	/**
	 * Get Sent On form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getSentOnFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("sent_on")->getFormElement($formElementOverride);
	}

	/**
	 * Set Ref Hash value
	 * @param mixed $value
	 * @return Email
	 * @throws InvalidForeignKeyValue
	 */
	public function setRefHashVal($value = null)
	{
		$this->setFieldValue("ref_hash", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Ref Hash value
	 * @return mixed
	 */
	public function getRefHashVal()
	{
		return $this->getFieldValue("ref_hash");
	}

	/**
	 * Get Ref Hash field reference
	 * @return Field
	 */
	public function getRefHashFld()
	{
		return $this->getField("ref_hash");
	}

	/**
	 * Get Ref Hash form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getRefHashFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("ref_hash")->getFormElement($formElementOverride);
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
	 * @return Email[]
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

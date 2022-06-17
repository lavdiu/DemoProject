<?php

namespace Lavdiu\DemoApp\Base;

use Laf\Database;
use Laf\Database\Table;
use Laf\Database\Field\Field;
use Laf\Database\PrimaryKey;
use Laf\Database\ForeignKey;
use Laf\UI\Form\FormElementInterface;
use Laf\UI\ComponentInterface;
use Lavdiu\DemoApp\Person;
use Laf\Exception\InvalidForeignKeyValue;

/**
 * Class BasePerson
 * @package Lavdiu\DemoApp\Base
 * Base Class for Table person
 * Basic definition of the fields and relationship with the Database Table person
 * This class will be auto-generated every time there is a schema change
 * Please do not add code here. Instead add your code at the main class one directory above
 */
class BasePerson extends Database\BaseObject
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
		$this->setTable(new Table('person'));
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
			->setName("reports_to_id")
			->setLabel("Reports To")
			->setPlaceHolder("Reports To")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("name")
			->setLabel("Name")
			->setPlaceHolder("Name")
			->setRequired(false)
			->setMaxLength(50)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("email")
			->setLabel("Email")
			->setPlaceHolder("Email")
			->setRequired(false)
			->setMaxLength(50)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("username")
			->setLabel("Username")
			->setPlaceHolder("Username")
			->setRequired(false)
			->setMaxLength(50)
			->setAutoIncrement(false)
			->setUnique(true)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addUniqueField($field);
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("password")
			->setLabel("Password")
			->setPlaceHolder("Password")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
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
			->setName("address_id")
			->setLabel("Address")
			->setPlaceHolder("Address")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("time_zone_id")
			->setLabel("Time Zone")
			->setPlaceHolder("Time Zone")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("profile_picture_id")
			->setLabel("Profile Picture")
			->setPlaceHolder("Profile Picture")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("phone")
			->setLabel("Phone")
			->setPlaceHolder("Phone")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("login_cookie")
			->setLabel("Login Cookie")
			->setPlaceHolder("Login Cookie")
			->setRequired(false)
			->setMaxLength(65535)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeText());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("login_ip")
			->setLabel("Login Ip")
			->setPlaceHolder("Login Ip")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("login_time")
			->setLabel("Login Time")
			->setPlaceHolder("Login Time")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeDateTime());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("login_duration_minutes")
			->setLabel("Login Duration Minutes")
			->setPlaceHolder("Login Duration Minutes")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("login_agent")
			->setLabel("Login Agent")
			->setPlaceHolder("Login Agent")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("activation_code")
			->setLabel("Activation Code")
			->setPlaceHolder("Activation Code")
			->setRequired(false)
			->setMaxLength(65535)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeText());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("reset_password_code")
			->setLabel("Reset Password Code")
			->setPlaceHolder("Reset Password Code")
			->setRequired(false)
			->setMaxLength(65535)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeText());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("reset_password_time")
			->setLabel("Reset Password Time")
			->setPlaceHolder("Reset Password Time")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeDateTime());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("requires_login_device_approval")
			->setLabel("Requires Login Device Approval")
			->setPlaceHolder("Requires Login Device Approval")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("modulet")
			->setLabel("Modulet")
			->setPlaceHolder("Modulet")
			->setRequired(false)
			->setMaxLength(65535)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeText());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("person_type_id")
			->setLabel("Person Type")
			->setPlaceHolder("Person Type")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("last_activity")
			->setLabel("Last Activity")
			->setPlaceHolder("Last Activity")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeDateTime());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("job_title")
			->setLabel("Job Title")
			->setPlaceHolder("Job Title")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("work_location")
			->setLabel("Work Location")
			->setPlaceHolder("Work Location")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("time_restricted_login_start_time")
			->setLabel("Time Restricted Login Start Time")
			->setPlaceHolder("Time Restricted Login Start Time")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeTime());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("time_restricted_login_end_time")
			->setLabel("Time Restricted Login End Time")
			->setPlaceHolder("Time Restricted Login End Time")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeTime());
		$this->getTable()->addField($field);
		$field = null;

		$this->getTable()->setPrimaryKey($pk);

		/**
		 * Generating Foreign keys
		 */
		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("reports_to_id"))
				->setKeyName('demoapp_lafperson_reports_to_id_fk')
				->setReferencingTable("person")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("created_by"))
				->setKeyName('demoapp_lafperson_created_by_id_fk')
				->setReferencingTable("person")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("updated_by"))
				->setKeyName('demoapp_lafperson_updated_by_id_fk')
				->setReferencingTable("person")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("record_status_id"))
				->setKeyName('demoapp_lafperson_record_status_id_fk')
				->setReferencingTable("record_status")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("address_id"))
				->setKeyName('demoapp_lafperson_record_address_id_fk')
				->setReferencingTable("address")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("time_zone_id"))
				->setKeyName('demoapp_lafperson_tz_id_fk')
				->setReferencingTable("time_zone")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("profile_picture_id"))
				->setKeyName('demoapp_lafperson_profile_pic_id_fk')
				->setReferencingTable("document")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("requires_login_device_approval"))
				->setKeyName('demoapp_lafperson_requires_login_device_approval_fk')
				->setReferencingTable("yes_or_no")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("person_type_id"))
				->setKeyName('demoapp_lafperson_p_type_id_fk')
				->setReferencingTable("person_type")
				->setReferencingField("id")
		);

	}

	/**
	 * Set Id value
	 * @param mixed $value
	 * @return Person
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
	 * Set Reports To value
	 * @param mixed $value
	 * @return Person
	 * @throws InvalidForeignKeyValue
	 */
	public function setReportsToIdVal($value = null)
	{
		$this->setFieldValue("reports_to_id", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Reports To value
	 * @return mixed
	 */
	public function getReportsToIdVal()
	{
		return $this->getFieldValue("reports_to_id");
	}

	/**
	 * Get Reports To field reference
	 * @return Field
	 */
	public function getReportsToIdFld()
	{
		return $this->getField("reports_to_id");
	}

	/**
	 * Get Reports To form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getReportsToIdFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("reports_to_id")->getFormElement($formElementOverride);
	}

	/**
	 * Get Person Object
	 * @return \Lavdiu\DemoApp\Person
	 */
	public function getReportsToIdObj()
	{
		if (is_numeric($this->getReportsToIdVal())) {
			return new \Lavdiu\DemoApp\Person($this->getReportsToIdVal());
		} else {
			return new \Lavdiu\DemoApp\Person();
		}
	}

	/**
	 * Set Name value
	 * @param mixed $value
	 * @return Person
	 * @throws InvalidForeignKeyValue
	 */
	public function setNameVal($value = null)
	{
		$this->setFieldValue("name", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Name value
	 * @return mixed
	 */
	public function getNameVal()
	{
		return $this->getFieldValue("name");
	}

	/**
	 * Get Name field reference
	 * @return Field
	 */
	public function getNameFld()
	{
		return $this->getField("name");
	}

	/**
	 * Get Name form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getNameFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("name")->getFormElement($formElementOverride);
	}

	/**
	 * Set Email value
	 * @param mixed $value
	 * @return Person
	 * @throws InvalidForeignKeyValue
	 */
	public function setEmailVal($value = null)
	{
		$this->setFieldValue("email", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Email value
	 * @return mixed
	 */
	public function getEmailVal()
	{
		return $this->getFieldValue("email");
	}

	/**
	 * Get Email field reference
	 * @return Field
	 */
	public function getEmailFld()
	{
		return $this->getField("email");
	}

	/**
	 * Get Email form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getEmailFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("email")->getFormElement($formElementOverride);
	}

	/**
	 * Set Username value
	 * @param mixed $value
	 * @return Person
	 * @throws InvalidForeignKeyValue
	 */
	public function setUsernameVal($value = null)
	{
		$this->setFieldValue("username", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Username value
	 * @return mixed
	 */
	public function getUsernameVal()
	{
		return $this->getFieldValue("username");
	}

	/**
	 * Get Username field reference
	 * @return Field
	 */
	public function getUsernameFld()
	{
		return $this->getField("username");
	}

	/**
	 * Get Username form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getUsernameFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("username")->getFormElement($formElementOverride);
	}

	/**
	 * Set Password value
	 * @param mixed $value
	 * @return Person
	 * @throws InvalidForeignKeyValue
	 */
	public function setPasswordVal($value = null)
	{
		$this->setFieldValue("password", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Password value
	 * @return mixed
	 */
	public function getPasswordVal()
	{
		return $this->getFieldValue("password");
	}

	/**
	 * Get Password field reference
	 * @return Field
	 */
	public function getPasswordFld()
	{
		return $this->getField("password");
	}

	/**
	 * Get Password form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getPasswordFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("password")->getFormElement($formElementOverride);
	}

	/**
	 * Set Created On value
	 * @param mixed $value
	 * @return Person
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
	 * @return Person
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
	 * Set Updated On value
	 * @param mixed $value
	 * @return Person
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
	 * Set Updated By value
	 * @param mixed $value
	 * @return Person
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
	 * Set Record Status value
	 * @param mixed $value
	 * @return Person
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
	 * Set Address value
	 * @param mixed $value
	 * @return Person
	 * @throws InvalidForeignKeyValue
	 */
	public function setAddressIdVal($value = null)
	{
		$this->setFieldValue("address_id", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Address value
	 * @return mixed
	 */
	public function getAddressIdVal()
	{
		return $this->getFieldValue("address_id");
	}

	/**
	 * Get Address field reference
	 * @return Field
	 */
	public function getAddressIdFld()
	{
		return $this->getField("address_id");
	}

	/**
	 * Get Address form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getAddressIdFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("address_id")->getFormElement($formElementOverride);
	}

	/**
	 * Get Address Object
	 * @return \Lavdiu\DemoApp\Address
	 */
	public function getAddressIdObj()
	{
		if (is_numeric($this->getAddressIdVal())) {
			return new \Lavdiu\DemoApp\Address($this->getAddressIdVal());
		} else {
			return new \Lavdiu\DemoApp\Address();
		}
	}

	/**
	 * Set Time Zone value
	 * @param mixed $value
	 * @return Person
	 * @throws InvalidForeignKeyValue
	 */
	public function setTimeZoneIdVal($value = null)
	{
		$this->setFieldValue("time_zone_id", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Time Zone value
	 * @return mixed
	 */
	public function getTimeZoneIdVal()
	{
		return $this->getFieldValue("time_zone_id");
	}

	/**
	 * Get Time Zone field reference
	 * @return Field
	 */
	public function getTimeZoneIdFld()
	{
		return $this->getField("time_zone_id");
	}

	/**
	 * Get Time Zone form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getTimeZoneIdFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("time_zone_id")->getFormElement($formElementOverride);
	}

	/**
	 * Get TimeZone Object
	 * @return \Lavdiu\DemoApp\TimeZone
	 */
	public function getTimeZoneIdObj()
	{
		if (is_numeric($this->getTimeZoneIdVal())) {
			return new \Lavdiu\DemoApp\TimeZone($this->getTimeZoneIdVal());
		} else {
			return new \Lavdiu\DemoApp\TimeZone();
		}
	}

	/**
	 * Set Profile Picture value
	 * @param mixed $value
	 * @return Person
	 * @throws InvalidForeignKeyValue
	 */
	public function setProfilePictureIdVal($value = null)
	{
		$this->setFieldValue("profile_picture_id", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Profile Picture value
	 * @return mixed
	 */
	public function getProfilePictureIdVal()
	{
		return $this->getFieldValue("profile_picture_id");
	}

	/**
	 * Get Profile Picture field reference
	 * @return Field
	 */
	public function getProfilePictureIdFld()
	{
		return $this->getField("profile_picture_id");
	}

	/**
	 * Get Profile Picture form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getProfilePictureIdFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("profile_picture_id")->getFormElement($formElementOverride);
	}

	/**
	 * Get Document Object
	 * @return \Lavdiu\DemoApp\Document
	 */
	public function getProfilePictureIdObj()
	{
		if (is_numeric($this->getProfilePictureIdVal())) {
			return new \Lavdiu\DemoApp\Document($this->getProfilePictureIdVal());
		} else {
			return new \Lavdiu\DemoApp\Document();
		}
	}

	/**
	 * Set Phone value
	 * @param mixed $value
	 * @return Person
	 * @throws InvalidForeignKeyValue
	 */
	public function setPhoneVal($value = null)
	{
		$this->setFieldValue("phone", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Phone value
	 * @return mixed
	 */
	public function getPhoneVal()
	{
		return $this->getFieldValue("phone");
	}

	/**
	 * Get Phone field reference
	 * @return Field
	 */
	public function getPhoneFld()
	{
		return $this->getField("phone");
	}

	/**
	 * Get Phone form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getPhoneFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("phone")->getFormElement($formElementOverride);
	}

	/**
	 * Set Login Cookie value
	 * @param mixed $value
	 * @return Person
	 * @throws InvalidForeignKeyValue
	 */
	public function setLoginCookieVal($value = null)
	{
		$this->setFieldValue("login_cookie", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Login Cookie value
	 * @return mixed
	 */
	public function getLoginCookieVal()
	{
		return $this->getFieldValue("login_cookie");
	}

	/**
	 * Get Login Cookie field reference
	 * @return Field
	 */
	public function getLoginCookieFld()
	{
		return $this->getField("login_cookie");
	}

	/**
	 * Get Login Cookie form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getLoginCookieFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("login_cookie")->getFormElement($formElementOverride);
	}

	/**
	 * Set Login Ip value
	 * @param mixed $value
	 * @return Person
	 * @throws InvalidForeignKeyValue
	 */
	public function setLoginIpVal($value = null)
	{
		$this->setFieldValue("login_ip", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Login Ip value
	 * @return mixed
	 */
	public function getLoginIpVal()
	{
		return $this->getFieldValue("login_ip");
	}

	/**
	 * Get Login Ip field reference
	 * @return Field
	 */
	public function getLoginIpFld()
	{
		return $this->getField("login_ip");
	}

	/**
	 * Get Login Ip form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getLoginIpFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("login_ip")->getFormElement($formElementOverride);
	}

	/**
	 * Set Login Time value
	 * @param mixed $value
	 * @return Person
	 * @throws InvalidForeignKeyValue
	 */
	public function setLoginTimeVal($value = null)
	{
		$this->setFieldValue("login_time", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Login Time value
	 * @return mixed
	 */
	public function getLoginTimeVal()
	{
		return $this->getFieldValue("login_time");
	}

	/**
	 * Get Login Time field reference
	 * @return Field
	 */
	public function getLoginTimeFld()
	{
		return $this->getField("login_time");
	}

	/**
	 * Get Login Time form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getLoginTimeFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("login_time")->getFormElement($formElementOverride);
	}

	/**
	 * Set Login Duration Minutes value
	 * @param mixed $value
	 * @return Person
	 * @throws InvalidForeignKeyValue
	 */
	public function setLoginDurationMinutesVal($value = null)
	{
		$this->setFieldValue("login_duration_minutes", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Login Duration Minutes value
	 * @return mixed
	 */
	public function getLoginDurationMinutesVal()
	{
		return $this->getFieldValue("login_duration_minutes");
	}

	/**
	 * Get Login Duration Minutes field reference
	 * @return Field
	 */
	public function getLoginDurationMinutesFld()
	{
		return $this->getField("login_duration_minutes");
	}

	/**
	 * Get Login Duration Minutes form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getLoginDurationMinutesFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("login_duration_minutes")->getFormElement($formElementOverride);
	}

	/**
	 * Set Login Agent value
	 * @param mixed $value
	 * @return Person
	 * @throws InvalidForeignKeyValue
	 */
	public function setLoginAgentVal($value = null)
	{
		$this->setFieldValue("login_agent", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Login Agent value
	 * @return mixed
	 */
	public function getLoginAgentVal()
	{
		return $this->getFieldValue("login_agent");
	}

	/**
	 * Get Login Agent field reference
	 * @return Field
	 */
	public function getLoginAgentFld()
	{
		return $this->getField("login_agent");
	}

	/**
	 * Get Login Agent form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getLoginAgentFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("login_agent")->getFormElement($formElementOverride);
	}

	/**
	 * Set Activation Code value
	 * @param mixed $value
	 * @return Person
	 * @throws InvalidForeignKeyValue
	 */
	public function setActivationCodeVal($value = null)
	{
		$this->setFieldValue("activation_code", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Activation Code value
	 * @return mixed
	 */
	public function getActivationCodeVal()
	{
		return $this->getFieldValue("activation_code");
	}

	/**
	 * Get Activation Code field reference
	 * @return Field
	 */
	public function getActivationCodeFld()
	{
		return $this->getField("activation_code");
	}

	/**
	 * Get Activation Code form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getActivationCodeFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("activation_code")->getFormElement($formElementOverride);
	}

	/**
	 * Set Reset Password Code value
	 * @param mixed $value
	 * @return Person
	 * @throws InvalidForeignKeyValue
	 */
	public function setResetPasswordCodeVal($value = null)
	{
		$this->setFieldValue("reset_password_code", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Reset Password Code value
	 * @return mixed
	 */
	public function getResetPasswordCodeVal()
	{
		return $this->getFieldValue("reset_password_code");
	}

	/**
	 * Get Reset Password Code field reference
	 * @return Field
	 */
	public function getResetPasswordCodeFld()
	{
		return $this->getField("reset_password_code");
	}

	/**
	 * Get Reset Password Code form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getResetPasswordCodeFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("reset_password_code")->getFormElement($formElementOverride);
	}

	/**
	 * Set Reset Password Time value
	 * @param mixed $value
	 * @return Person
	 * @throws InvalidForeignKeyValue
	 */
	public function setResetPasswordTimeVal($value = null)
	{
		$this->setFieldValue("reset_password_time", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Reset Password Time value
	 * @return mixed
	 */
	public function getResetPasswordTimeVal()
	{
		return $this->getFieldValue("reset_password_time");
	}

	/**
	 * Get Reset Password Time field reference
	 * @return Field
	 */
	public function getResetPasswordTimeFld()
	{
		return $this->getField("reset_password_time");
	}

	/**
	 * Get Reset Password Time form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getResetPasswordTimeFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("reset_password_time")->getFormElement($formElementOverride);
	}

	/**
	 * Set Requires Login Device Approval value
	 * @param mixed $value
	 * @return Person
	 * @throws InvalidForeignKeyValue
	 */
	public function setRequiresLoginDeviceApprovalVal($value = null)
	{
		$this->setFieldValue("requires_login_device_approval", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Requires Login Device Approval value
	 * @return mixed
	 */
	public function getRequiresLoginDeviceApprovalVal()
	{
		return $this->getFieldValue("requires_login_device_approval");
	}

	/**
	 * Get Requires Login Device Approval field reference
	 * @return Field
	 */
	public function getRequiresLoginDeviceApprovalFld()
	{
		return $this->getField("requires_login_device_approval");
	}

	/**
	 * Get Requires Login Device Approval form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getRequiresLoginDeviceApprovalFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("requires_login_device_approval")->getFormElement($formElementOverride);
	}

	/**
	 * Get YesOrNo Object
	 * @return \Lavdiu\DemoApp\YesOrNo
	 */
	public function getRequiresLoginDeviceApprovalObj()
	{
		if (is_numeric($this->getRequiresLoginDeviceApprovalVal())) {
			return new \Lavdiu\DemoApp\YesOrNo($this->getRequiresLoginDeviceApprovalVal());
		} else {
			return new \Lavdiu\DemoApp\YesOrNo();
		}
	}

	/**
	 * Set Modulet value
	 * @param mixed $value
	 * @return Person
	 * @throws InvalidForeignKeyValue
	 */
	public function setModuletVal($value = null)
	{
		$this->setFieldValue("modulet", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Modulet value
	 * @return mixed
	 */
	public function getModuletVal()
	{
		return $this->getFieldValue("modulet");
	}

	/**
	 * Get Modulet field reference
	 * @return Field
	 */
	public function getModuletFld()
	{
		return $this->getField("modulet");
	}

	/**
	 * Get Modulet form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getModuletFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("modulet")->getFormElement($formElementOverride);
	}

	/**
	 * Set Person Type value
	 * @param mixed $value
	 * @return Person
	 * @throws InvalidForeignKeyValue
	 */
	public function setPersonTypeIdVal($value = null)
	{
		$this->setFieldValue("person_type_id", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Person Type value
	 * @return mixed
	 */
	public function getPersonTypeIdVal()
	{
		return $this->getFieldValue("person_type_id");
	}

	/**
	 * Get Person Type field reference
	 * @return Field
	 */
	public function getPersonTypeIdFld()
	{
		return $this->getField("person_type_id");
	}

	/**
	 * Get Person Type form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getPersonTypeIdFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("person_type_id")->getFormElement($formElementOverride);
	}

	/**
	 * Get PersonType Object
	 * @return \Lavdiu\DemoApp\PersonType
	 */
	public function getPersonTypeIdObj()
	{
		if (is_numeric($this->getPersonTypeIdVal())) {
			return new \Lavdiu\DemoApp\PersonType($this->getPersonTypeIdVal());
		} else {
			return new \Lavdiu\DemoApp\PersonType();
		}
	}

	/**
	 * Set Last Activity value
	 * @param mixed $value
	 * @return Person
	 * @throws InvalidForeignKeyValue
	 */
	public function setLastActivityVal($value = null)
	{
		$this->setFieldValue("last_activity", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Last Activity value
	 * @return mixed
	 */
	public function getLastActivityVal()
	{
		return $this->getFieldValue("last_activity");
	}

	/**
	 * Get Last Activity field reference
	 * @return Field
	 */
	public function getLastActivityFld()
	{
		return $this->getField("last_activity");
	}

	/**
	 * Get Last Activity form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getLastActivityFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("last_activity")->getFormElement($formElementOverride);
	}

	/**
	 * Set Job Title value
	 * @param mixed $value
	 * @return Person
	 * @throws InvalidForeignKeyValue
	 */
	public function setJobTitleVal($value = null)
	{
		$this->setFieldValue("job_title", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Job Title value
	 * @return mixed
	 */
	public function getJobTitleVal()
	{
		return $this->getFieldValue("job_title");
	}

	/**
	 * Get Job Title field reference
	 * @return Field
	 */
	public function getJobTitleFld()
	{
		return $this->getField("job_title");
	}

	/**
	 * Get Job Title form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getJobTitleFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("job_title")->getFormElement($formElementOverride);
	}

	/**
	 * Set Work Location value
	 * @param mixed $value
	 * @return Person
	 * @throws InvalidForeignKeyValue
	 */
	public function setWorkLocationVal($value = null)
	{
		$this->setFieldValue("work_location", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Work Location value
	 * @return mixed
	 */
	public function getWorkLocationVal()
	{
		return $this->getFieldValue("work_location");
	}

	/**
	 * Get Work Location field reference
	 * @return Field
	 */
	public function getWorkLocationFld()
	{
		return $this->getField("work_location");
	}

	/**
	 * Get Work Location form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getWorkLocationFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("work_location")->getFormElement($formElementOverride);
	}

	/**
	 * Set Time Restricted Login Start Time value
	 * @param mixed $value
	 * @return Person
	 * @throws InvalidForeignKeyValue
	 */
	public function setTimeRestrictedLoginStartTimeVal($value = null)
	{
		$this->setFieldValue("time_restricted_login_start_time", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Time Restricted Login Start Time value
	 * @return mixed
	 */
	public function getTimeRestrictedLoginStartTimeVal()
	{
		return $this->getFieldValue("time_restricted_login_start_time");
	}

	/**
	 * Get Time Restricted Login Start Time field reference
	 * @return Field
	 */
	public function getTimeRestrictedLoginStartTimeFld()
	{
		return $this->getField("time_restricted_login_start_time");
	}

	/**
	 * Get Time Restricted Login Start Time form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getTimeRestrictedLoginStartTimeFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("time_restricted_login_start_time")->getFormElement($formElementOverride);
	}

	/**
	 * Set Time Restricted Login End Time value
	 * @param mixed $value
	 * @return Person
	 * @throws InvalidForeignKeyValue
	 */
	public function setTimeRestrictedLoginEndTimeVal($value = null)
	{
		$this->setFieldValue("time_restricted_login_end_time", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Time Restricted Login End Time value
	 * @return mixed
	 */
	public function getTimeRestrictedLoginEndTimeVal()
	{
		return $this->getFieldValue("time_restricted_login_end_time");
	}

	/**
	 * Get Time Restricted Login End Time field reference
	 * @return Field
	 */
	public function getTimeRestrictedLoginEndTimeFld()
	{
		return $this->getField("time_restricted_login_end_time");
	}

	/**
	 * Get Time Restricted Login End Time form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getTimeRestrictedLoginEndTimeFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("time_restricted_login_end_time")->getFormElement($formElementOverride);
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
	 * @return Person[]
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

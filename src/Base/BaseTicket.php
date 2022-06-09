<?php

namespace Lavdiu\DemoApp\Base;

use Laf\Database;
use Laf\Database\Table;
use Laf\Database\Field\Field;
use Laf\Database\PrimaryKey;
use Laf\Database\ForeignKey;
use Laf\UI\Form\FormElementInterface;
use Laf\UI\ComponentInterface;
use Lavdiu\DemoApp\Ticket;
use Laf\Exception\InvalidForeignKeyValue;

/**
 * Class BaseTicket
 * @package Lavdiu\DemoApp\Base
 * Base Class for Table ticket
 * Basic definition of the fields and relationship with the Database Table ticket
 * This class will be auto-generated every time there is a schema change
 * Please do not add code here. Instead add your code at the main class one directory above
 */
class BaseTicket extends Database\BaseObject
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
		$this->setTable(new Table('ticket'));
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

		$field = (new Field())
			->setName("approved_by")
			->setLabel("Approved By")
			->setPlaceHolder("Approved By")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("approved_on")
			->setLabel("Approved On")
			->setPlaceHolder("Approved On")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeDateTime());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("resolution")
			->setLabel("Resolution")
			->setPlaceHolder("Resolution")
			->setRequired(false)
			->setMaxLength(65535)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeText());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("assigned_to")
			->setLabel("Assigned To")
			->setPlaceHolder("Assigned To")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("ticket_status_id")
			->setLabel("Ticket Status")
			->setPlaceHolder("Ticket Status")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("ticket_category_id")
			->setLabel("Ticket Category")
			->setPlaceHolder("Ticket Category")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("requested_by")
			->setLabel("Requested By")
			->setPlaceHolder("Requested By")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("ticket_priority_id")
			->setLabel("Ticket Priority")
			->setPlaceHolder("Ticket Priority")
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
				->setKeyName('ticket_created_by_fk1')
				->setReferencingTable("person")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("updated_by"))
				->setKeyName('ticket_updated_by_fk2')
				->setReferencingTable("person")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("approved_by"))
				->setKeyName('ticket_approved_by_fk3')
				->setReferencingTable("person")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("assigned_to"))
				->setKeyName('ticket_assigned_to_fk4')
				->setReferencingTable("person")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("ticket_status_id"))
				->setKeyName('ticket_ticket_status_fk5')
				->setReferencingTable("ticket_status")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("ticket_category_id"))
				->setKeyName('ticket_ticket_category_fk6')
				->setReferencingTable("ticket_category")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("requested_by"))
				->setKeyName('ticket_requested_by_fk1')
				->setReferencingTable("person")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("ticket_priority_id"))
				->setKeyName('ticket_t_priority_id_fk')
				->setReferencingTable("ticket_priority")
				->setReferencingField("id")
		);

	}

	/**
	 * Set Id value
	 * @param mixed $value
	 * @return Ticket
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
	 * Set Subject value
	 * @param mixed $value
	 * @return Ticket
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
	 * @return Ticket
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
	 * Set Created By value
	 * @param mixed $value
	 * @return Ticket
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
	 * @return Ticket
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
	 * @return Ticket
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
	 * @return Ticket
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
	 * Set Approved By value
	 * @param mixed $value
	 * @return Ticket
	 * @throws InvalidForeignKeyValue
	 */
	public function setApprovedByVal($value = null)
	{
		$this->setFieldValue("approved_by", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Approved By value
	 * @return mixed
	 */
	public function getApprovedByVal()
	{
		return $this->getFieldValue("approved_by");
	}

	/**
	 * Get Approved By field reference
	 * @return Field
	 */
	public function getApprovedByFld()
	{
		return $this->getField("approved_by");
	}

	/**
	 * Get Approved By form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getApprovedByFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("approved_by")->getFormElement($formElementOverride);
	}

	/**
	 * Get Person Object
	 * @return \Lavdiu\DemoApp\Person
	 */
	public function getApprovedByObj()
	{
		if (is_numeric($this->getApprovedByVal())) {
			return new \Lavdiu\DemoApp\Person($this->getApprovedByVal());
		} else {
			return new \Lavdiu\DemoApp\Person();
		}
	}

	/**
	 * Set Approved On value
	 * @param mixed $value
	 * @return Ticket
	 * @throws InvalidForeignKeyValue
	 */
	public function setApprovedOnVal($value = null)
	{
		$this->setFieldValue("approved_on", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Approved On value
	 * @return mixed
	 */
	public function getApprovedOnVal()
	{
		return $this->getFieldValue("approved_on");
	}

	/**
	 * Get Approved On field reference
	 * @return Field
	 */
	public function getApprovedOnFld()
	{
		return $this->getField("approved_on");
	}

	/**
	 * Get Approved On form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getApprovedOnFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("approved_on")->getFormElement($formElementOverride);
	}

	/**
	 * Set Resolution value
	 * @param mixed $value
	 * @return Ticket
	 * @throws InvalidForeignKeyValue
	 */
	public function setResolutionVal($value = null)
	{
		$this->setFieldValue("resolution", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Resolution value
	 * @return mixed
	 */
	public function getResolutionVal()
	{
		return $this->getFieldValue("resolution");
	}

	/**
	 * Get Resolution field reference
	 * @return Field
	 */
	public function getResolutionFld()
	{
		return $this->getField("resolution");
	}

	/**
	 * Get Resolution form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getResolutionFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("resolution")->getFormElement($formElementOverride);
	}

	/**
	 * Set Assigned To value
	 * @param mixed $value
	 * @return Ticket
	 * @throws InvalidForeignKeyValue
	 */
	public function setAssignedToVal($value = null)
	{
		$this->setFieldValue("assigned_to", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Assigned To value
	 * @return mixed
	 */
	public function getAssignedToVal()
	{
		return $this->getFieldValue("assigned_to");
	}

	/**
	 * Get Assigned To field reference
	 * @return Field
	 */
	public function getAssignedToFld()
	{
		return $this->getField("assigned_to");
	}

	/**
	 * Get Assigned To form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getAssignedToFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("assigned_to")->getFormElement($formElementOverride);
	}

	/**
	 * Get Person Object
	 * @return \Lavdiu\DemoApp\Person
	 */
	public function getAssignedToObj()
	{
		if (is_numeric($this->getAssignedToVal())) {
			return new \Lavdiu\DemoApp\Person($this->getAssignedToVal());
		} else {
			return new \Lavdiu\DemoApp\Person();
		}
	}

	/**
	 * Set Ticket Status value
	 * @param mixed $value
	 * @return Ticket
	 * @throws InvalidForeignKeyValue
	 */
	public function setTicketStatusIdVal($value = null)
	{
		$this->setFieldValue("ticket_status_id", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Ticket Status value
	 * @return mixed
	 */
	public function getTicketStatusIdVal()
	{
		return $this->getFieldValue("ticket_status_id");
	}

	/**
	 * Get Ticket Status field reference
	 * @return Field
	 */
	public function getTicketStatusIdFld()
	{
		return $this->getField("ticket_status_id");
	}

	/**
	 * Get Ticket Status form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getTicketStatusIdFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("ticket_status_id")->getFormElement($formElementOverride);
	}

	/**
	 * Get TicketStatus Object
	 * @return \Lavdiu\DemoApp\TicketStatus
	 */
	public function getTicketStatusIdObj()
	{
		if (is_numeric($this->getTicketStatusIdVal())) {
			return new \Lavdiu\DemoApp\TicketStatus($this->getTicketStatusIdVal());
		} else {
			return new \Lavdiu\DemoApp\TicketStatus();
		}
	}

	/**
	 * Set Ticket Category value
	 * @param mixed $value
	 * @return Ticket
	 * @throws InvalidForeignKeyValue
	 */
	public function setTicketCategoryIdVal($value = null)
	{
		$this->setFieldValue("ticket_category_id", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Ticket Category value
	 * @return mixed
	 */
	public function getTicketCategoryIdVal()
	{
		return $this->getFieldValue("ticket_category_id");
	}

	/**
	 * Get Ticket Category field reference
	 * @return Field
	 */
	public function getTicketCategoryIdFld()
	{
		return $this->getField("ticket_category_id");
	}

	/**
	 * Get Ticket Category form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getTicketCategoryIdFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("ticket_category_id")->getFormElement($formElementOverride);
	}

	/**
	 * Get TicketCategory Object
	 * @return \Lavdiu\DemoApp\TicketCategory
	 */
	public function getTicketCategoryIdObj()
	{
		if (is_numeric($this->getTicketCategoryIdVal())) {
			return new \Lavdiu\DemoApp\TicketCategory($this->getTicketCategoryIdVal());
		} else {
			return new \Lavdiu\DemoApp\TicketCategory();
		}
	}

	/**
	 * Set Requested By value
	 * @param mixed $value
	 * @return Ticket
	 * @throws InvalidForeignKeyValue
	 */
	public function setRequestedByVal($value = null)
	{
		$this->setFieldValue("requested_by", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Requested By value
	 * @return mixed
	 */
	public function getRequestedByVal()
	{
		return $this->getFieldValue("requested_by");
	}

	/**
	 * Get Requested By field reference
	 * @return Field
	 */
	public function getRequestedByFld()
	{
		return $this->getField("requested_by");
	}

	/**
	 * Get Requested By form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getRequestedByFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("requested_by")->getFormElement($formElementOverride);
	}

	/**
	 * Get Person Object
	 * @return \Lavdiu\DemoApp\Person
	 */
	public function getRequestedByObj()
	{
		if (is_numeric($this->getRequestedByVal())) {
			return new \Lavdiu\DemoApp\Person($this->getRequestedByVal());
		} else {
			return new \Lavdiu\DemoApp\Person();
		}
	}

	/**
	 * Set Ticket Priority value
	 * @param mixed $value
	 * @return Ticket
	 * @throws InvalidForeignKeyValue
	 */
	public function setTicketPriorityIdVal($value = null)
	{
		$this->setFieldValue("ticket_priority_id", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Ticket Priority value
	 * @return mixed
	 */
	public function getTicketPriorityIdVal()
	{
		return $this->getFieldValue("ticket_priority_id");
	}

	/**
	 * Get Ticket Priority field reference
	 * @return Field
	 */
	public function getTicketPriorityIdFld()
	{
		return $this->getField("ticket_priority_id");
	}

	/**
	 * Get Ticket Priority form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getTicketPriorityIdFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("ticket_priority_id")->getFormElement($formElementOverride);
	}

	/**
	 * Get TicketPriority Object
	 * @return \Lavdiu\DemoApp\TicketPriority
	 */
	public function getTicketPriorityIdObj()
	{
		if (is_numeric($this->getTicketPriorityIdVal())) {
			return new \Lavdiu\DemoApp\TicketPriority($this->getTicketPriorityIdVal());
		} else {
			return new \Lavdiu\DemoApp\TicketPriority();
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
	 * @return Ticket[]
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

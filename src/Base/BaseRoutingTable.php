<?php

namespace Lavdiu\DemoApp\Base;

use Laf\Database;
use Laf\Database\Table;
use Laf\Database\Field\Field;
use Laf\Database\PrimaryKey;
use Laf\Database\ForeignKey;
use Laf\UI\Form\FormElementInterface;
use Laf\UI\ComponentInterface;
use Lavdiu\DemoApp\RoutingTable;
use Laf\Exception\InvalidForeignKeyValue;

/**
 * Class BaseRoutingTable
 * @package Lavdiu\DemoApp\Base
 * Base Class for Table routing_table
 * Basic definition of the fields and relationship with the Database Table routing_table
 * This class will be auto-generated every time there is a schema change
 * Please do not add code here. Instead add your code at the main class one directory above
 */
class BaseRoutingTable extends Database\BaseObject
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
		$this->setTable(new Table('routing_table'));
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
			->setName("parent_id")
			->setLabel("Parent")
			->setPlaceHolder("Parent")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("unique_name")
			->setLabel("Unique Name")
			->setPlaceHolder("Unique Name")
			->setRequired(false)
			->setMaxLength(55)
			->setAutoIncrement(false)
			->setUnique(true)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addUniqueField($field);
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("label")
			->setLabel("Label")
			->setPlaceHolder("Label")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("icon")
			->setLabel("Icon")
			->setPlaceHolder("Icon")
			->setRequired(false)
			->setMaxLength(100)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("page_file")
			->setLabel("Page File")
			->setPlaceHolder("Page File")
			->setRequired(false)
			->setMaxLength(150)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeVarchar());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("is_default")
			->setLabel("Is Default")
			->setPlaceHolder("Is Default")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("is_visible")
			->setLabel("Is Visible")
			->setPlaceHolder("Is Visible")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("ordinal")
			->setLabel("Ordinal")
			->setPlaceHolder("Ordinal")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("is_standalone")
			->setLabel("Is Standalone")
			->setPlaceHolder("Is Standalone")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("requires_login")
			->setLabel("Requires Login")
			->setPlaceHolder("Requires Login")
			->setRequired(false)
			->setMaxLength(255)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeInteger());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("actions")
			->setLabel("Actions")
			->setPlaceHolder("Actions")
			->setRequired(false)
			->setMaxLength(65535)
			->setAutoIncrement(false)
			->setUnique(false)
			->setType(new Database\Field\TypeText());
		$this->getTable()->addField($field);
		$field = null;

		$field = (new Field())
			->setName("viewable_for_all")
			->setLabel("Viewable For All")
			->setPlaceHolder("Viewable For All")
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
				->setField($this->getTable()->getField("parent_id"))
				->setKeyName('demoapp_lafrouting_table_parent_id_fk1')
				->setReferencingTable("routing_table")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("is_default"))
				->setKeyName('demoapp_lafroutingtable_is_default_fk4')
				->setReferencingTable("yes_or_no")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("is_visible"))
				->setKeyName('demoapp_lafrouting_table_visible_ix2')
				->setReferencingTable("yes_or_no")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("is_standalone"))
				->setKeyName('demoapp_lafroutingtable_is_standalone_fk4')
				->setReferencingTable("yes_or_no")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("requires_login"))
				->setKeyName('demoapp_lafroutingtable_requires_login_fk4')
				->setReferencingTable("yes_or_no")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("viewable_for_all"))
				->setKeyName('demoapp_lafroutingtable_viewable_fk4')
				->setReferencingTable("yes_or_no")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("created_by"))
				->setKeyName('demoapp_lafroutingtable_created_by_fk4')
				->setReferencingTable("person")
				->setReferencingField("id")
		);

		$this->getTable()->addForeignKey(
			(new ForeignKey())
				->setField($this->getTable()->getField("updated_by"))
				->setKeyName('demoapp_lafroutingtable_updated_by_fk4')
				->setReferencingTable("person")
				->setReferencingField("id")
		);

	}

	/**
	 * Set Id value
	 * @param mixed $value
	 * @return RoutingTable
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
	 * Set Parent value
	 * @param mixed $value
	 * @return RoutingTable
	 * @throws InvalidForeignKeyValue
	 */
	public function setParentIdVal($value = null)
	{
		$this->setFieldValue("parent_id", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Parent value
	 * @return mixed
	 */
	public function getParentIdVal()
	{
		return $this->getFieldValue("parent_id");
	}

	/**
	 * Get Parent field reference
	 * @return Field
	 */
	public function getParentIdFld()
	{
		return $this->getField("parent_id");
	}

	/**
	 * Get Parent form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getParentIdFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("parent_id")->getFormElement($formElementOverride);
	}

	/**
	 * Get RoutingTable Object
	 * @return \Lavdiu\DemoApp\RoutingTable
	 */
	public function getParentIdObj()
	{
		if (is_numeric($this->getParentIdVal())) {
			return new \Lavdiu\DemoApp\RoutingTable($this->getParentIdVal());
		} else {
			return new \Lavdiu\DemoApp\RoutingTable();
		}
	}

	/**
	 * Set Unique Name value
	 * @param mixed $value
	 * @return RoutingTable
	 * @throws InvalidForeignKeyValue
	 */
	public function setUniqueNameVal($value = null)
	{
		$this->setFieldValue("unique_name", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Unique Name value
	 * @return mixed
	 */
	public function getUniqueNameVal()
	{
		return $this->getFieldValue("unique_name");
	}

	/**
	 * Get Unique Name field reference
	 * @return Field
	 */
	public function getUniqueNameFld()
	{
		return $this->getField("unique_name");
	}

	/**
	 * Get Unique Name form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getUniqueNameFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("unique_name")->getFormElement($formElementOverride);
	}

	/**
	 * Set Label value
	 * @param mixed $value
	 * @return RoutingTable
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
	 * Set Icon value
	 * @param mixed $value
	 * @return RoutingTable
	 * @throws InvalidForeignKeyValue
	 */
	public function setIconVal($value = null)
	{
		$this->setFieldValue("icon", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Icon value
	 * @return mixed
	 */
	public function getIconVal()
	{
		return $this->getFieldValue("icon");
	}

	/**
	 * Get Icon field reference
	 * @return Field
	 */
	public function getIconFld()
	{
		return $this->getField("icon");
	}

	/**
	 * Get Icon form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getIconFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("icon")->getFormElement($formElementOverride);
	}

	/**
	 * Set Page File value
	 * @param mixed $value
	 * @return RoutingTable
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
	 * Set Is Default value
	 * @param mixed $value
	 * @return RoutingTable
	 * @throws InvalidForeignKeyValue
	 */
	public function setIsDefaultVal($value = null)
	{
		$this->setFieldValue("is_default", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Is Default value
	 * @return mixed
	 */
	public function getIsDefaultVal()
	{
		return $this->getFieldValue("is_default");
	}

	/**
	 * Get Is Default field reference
	 * @return Field
	 */
	public function getIsDefaultFld()
	{
		return $this->getField("is_default");
	}

	/**
	 * Get Is Default form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getIsDefaultFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("is_default")->getFormElement($formElementOverride);
	}

	/**
	 * Get YesOrNo Object
	 * @return \Lavdiu\DemoApp\YesOrNo
	 */
	public function getIsDefaultObj()
	{
		if (is_numeric($this->getIsDefaultVal())) {
			return new \Lavdiu\DemoApp\YesOrNo($this->getIsDefaultVal());
		} else {
			return new \Lavdiu\DemoApp\YesOrNo();
		}
	}

	/**
	 * Set Is Visible value
	 * @param mixed $value
	 * @return RoutingTable
	 * @throws InvalidForeignKeyValue
	 */
	public function setIsVisibleVal($value = null)
	{
		$this->setFieldValue("is_visible", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Is Visible value
	 * @return mixed
	 */
	public function getIsVisibleVal()
	{
		return $this->getFieldValue("is_visible");
	}

	/**
	 * Get Is Visible field reference
	 * @return Field
	 */
	public function getIsVisibleFld()
	{
		return $this->getField("is_visible");
	}

	/**
	 * Get Is Visible form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getIsVisibleFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("is_visible")->getFormElement($formElementOverride);
	}

	/**
	 * Get YesOrNo Object
	 * @return \Lavdiu\DemoApp\YesOrNo
	 */
	public function getIsVisibleObj()
	{
		if (is_numeric($this->getIsVisibleVal())) {
			return new \Lavdiu\DemoApp\YesOrNo($this->getIsVisibleVal());
		} else {
			return new \Lavdiu\DemoApp\YesOrNo();
		}
	}

	/**
	 * Set Ordinal value
	 * @param mixed $value
	 * @return RoutingTable
	 * @throws InvalidForeignKeyValue
	 */
	public function setOrdinalVal($value = null)
	{
		$this->setFieldValue("ordinal", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Ordinal value
	 * @return mixed
	 */
	public function getOrdinalVal()
	{
		return $this->getFieldValue("ordinal");
	}

	/**
	 * Get Ordinal field reference
	 * @return Field
	 */
	public function getOrdinalFld()
	{
		return $this->getField("ordinal");
	}

	/**
	 * Get Ordinal form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getOrdinalFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("ordinal")->getFormElement($formElementOverride);
	}

	/**
	 * Set Is Standalone value
	 * @param mixed $value
	 * @return RoutingTable
	 * @throws InvalidForeignKeyValue
	 */
	public function setIsStandaloneVal($value = null)
	{
		$this->setFieldValue("is_standalone", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Is Standalone value
	 * @return mixed
	 */
	public function getIsStandaloneVal()
	{
		return $this->getFieldValue("is_standalone");
	}

	/**
	 * Get Is Standalone field reference
	 * @return Field
	 */
	public function getIsStandaloneFld()
	{
		return $this->getField("is_standalone");
	}

	/**
	 * Get Is Standalone form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getIsStandaloneFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("is_standalone")->getFormElement($formElementOverride);
	}

	/**
	 * Get YesOrNo Object
	 * @return \Lavdiu\DemoApp\YesOrNo
	 */
	public function getIsStandaloneObj()
	{
		if (is_numeric($this->getIsStandaloneVal())) {
			return new \Lavdiu\DemoApp\YesOrNo($this->getIsStandaloneVal());
		} else {
			return new \Lavdiu\DemoApp\YesOrNo();
		}
	}

	/**
	 * Set Requires Login value
	 * @param mixed $value
	 * @return RoutingTable
	 * @throws InvalidForeignKeyValue
	 */
	public function setRequiresLoginVal($value = null)
	{
		$this->setFieldValue("requires_login", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Requires Login value
	 * @return mixed
	 */
	public function getRequiresLoginVal()
	{
		return $this->getFieldValue("requires_login");
	}

	/**
	 * Get Requires Login field reference
	 * @return Field
	 */
	public function getRequiresLoginFld()
	{
		return $this->getField("requires_login");
	}

	/**
	 * Get Requires Login form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getRequiresLoginFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("requires_login")->getFormElement($formElementOverride);
	}

	/**
	 * Get YesOrNo Object
	 * @return \Lavdiu\DemoApp\YesOrNo
	 */
	public function getRequiresLoginObj()
	{
		if (is_numeric($this->getRequiresLoginVal())) {
			return new \Lavdiu\DemoApp\YesOrNo($this->getRequiresLoginVal());
		} else {
			return new \Lavdiu\DemoApp\YesOrNo();
		}
	}

	/**
	 * Set Actions value
	 * @param mixed $value
	 * @return RoutingTable
	 * @throws InvalidForeignKeyValue
	 */
	public function setActionsVal($value = null)
	{
		$this->setFieldValue("actions", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Actions value
	 * @return mixed
	 */
	public function getActionsVal()
	{
		return $this->getFieldValue("actions");
	}

	/**
	 * Get Actions field reference
	 * @return Field
	 */
	public function getActionsFld()
	{
		return $this->getField("actions");
	}

	/**
	 * Get Actions form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getActionsFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("actions")->getFormElement($formElementOverride);
	}

	/**
	 * Set Viewable For All value
	 * @param mixed $value
	 * @return RoutingTable
	 * @throws InvalidForeignKeyValue
	 */
	public function setViewableForAllVal($value = null)
	{
		$this->setFieldValue("viewable_for_all", $value);
		return static::returnLeafClass();
	}

	/**
	 * Get Viewable For All value
	 * @return mixed
	 */
	public function getViewableForAllVal()
	{
		return $this->getFieldValue("viewable_for_all");
	}

	/**
	 * Get Viewable For All field reference
	 * @return Field
	 */
	public function getViewableForAllFld()
	{
		return $this->getField("viewable_for_all");
	}

	/**
	 * Get Viewable For All form element reference
	 * @param FormElementInterface|null $formElementOverride
	 * @return ComponentInterface
	 */
	public function getViewableForAllFormElement(FormElementInterface $formElementOverride = null) : ComponentInterface
	{
		return $this->getField("viewable_for_all")->getFormElement($formElementOverride);
	}

	/**
	 * Get YesOrNo Object
	 * @return \Lavdiu\DemoApp\YesOrNo
	 */
	public function getViewableForAllObj()
	{
		if (is_numeric($this->getViewableForAllVal())) {
			return new \Lavdiu\DemoApp\YesOrNo($this->getViewableForAllVal());
		} else {
			return new \Lavdiu\DemoApp\YesOrNo();
		}
	}

	/**
	 * Set Created By value
	 * @param mixed $value
	 * @return RoutingTable
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
	 * @return RoutingTable
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
	 * @return RoutingTable
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
	 * @return RoutingTable
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
	 * @return RoutingTable[]
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

<?php

namespace Lavdiu\DemoApp;

use Laf\UI\Grid\PhpGrid\ActionButton;
use Laf\UI\Grid\PhpGrid\Column;
use Laf\UI\Grid\PhpGrid\PhpGrid;
use Laf\Util\UrlParser;

/**
 * Class Group
 * @package Lavdiu\DemoApp
 * Main Class for Table group
 * This class inherits functionality from BaseGroup.
 * It is generated only once, please include all logic and code here
 */
class Group extends Base\BaseGroup
{
	/**
	 * Instructors constructor.
	 * @param int $id
	 */
	public function __construct($id = null)
	{
		parent::__construct($id);
	}

	/**
	 * Returns the lowest level class in the inheritance tree
	 * Used with late static binding to get the lowest level class
	 */
	protected function returnLeafClass()
	{
		return $this;
	}
	
	/**
	 * Find one row by using the first result
	 * @param array $keyValuePairs
	 * @return Group
	 * @throws \Exception
	 */
	public static function findOne(array $keyValuePairs) : ?Group
	{
		return parent::bOfindOne($keyValuePairs);
	}
	
	/**
	 * @param array $keyValuePairs
	 * @return Group[]
	 * @throws \Exception
	 */
	public static function find(array $keyValuePairs = []) : array
	{
		return parent::bOfind($keyValuePairs);
	}

    public static function getIcon(): ?string
    {
        return 'fas fa-user-friends';
    }

    /**
     * @return PhpGrid
     */
    public function getRelatedUsersGrid(): PhpGrid
    {
        $grid = new PhpGrid('person_group_list');
        $grid->setTitle('Related Users')
            ->setRowsPerPage(20)
            ->setSqlQuery('
SELECT * FROM (
	SELECT
		  `person_group`.`id` AS person_group_id
		, `person`.`name` AS person_name
		, person.id as person_id
	FROM person_group person_group
	LEFT JOIN `person` `person` ON `person_group`.`person_id` = `person`.`id`
	WHERE 1=1  AND person_group.group_id = ' . $this->getIdVal() . '

)l1 ');

        $grid->addColumn(new Column('person_group_id', 'Id', true));
        $grid->addColumn(new Column('person_name', 'User Name', true));
        $grid->addColumn(new Column('person_id', 'Person Id', true));
        $grid->setShowSearchBar(false)
            ->setAllowExport(false)
            ->setShowTitle(false);

        $deleteLink = new ActionButton('Delete', sprintf('?module=%s&action=delete&id={person_group_id}', UrlParser::getModule()), 'fa fa-trash');
        $deleteLink->addAttribute('onclick', "return confirm('Are you sure you want to delete this?')");
        $grid->addActionButton($deleteLink);
        return $grid;
    }

    /**
     * @return PhpGrid
     */
    public function getRelatedRolesGrid(): PhpGrid
    {
        $grid = new PhpGrid('group_role_list');
        $grid->setTitle('Related Roles')
            ->setRowsPerPage(20)
            ->setSqlQuery('
SELECT * FROM (
	SELECT
		  `group_role`.`id` AS group_role_id
		, `role`.`label` AS role_label
	    , role.id as role_id
	FROM group_role group_role
	LEFT JOIN `role` `role` ON `group_role`.`role_id` = `role`.`id`
	LEFT JOIN `group` `group` ON `group_role`.`group_id` = `group`.`id`
	WHERE 1=1  AND `group`.id = ' . $this->getIdVal() . '

)l1 ');

        $grid->addColumn(new Column('group_role_id', 'Id', true));
        $grid->addColumn(new Column('role_label', 'User Role', true));
        $grid->addColumn(new Column('role_id', 'Role Id', true));

        $deleteLink = new ActionButton('Delete', sprintf('?module=%s&action=delete&id={group_role_id}', UrlParser::getModule()), 'fa fa-trash');
        $deleteLink->addAttribute('onclick', "return confirm('Are you sure you want to delete this?')");
        $grid->addActionButton($deleteLink);
        $grid->setShowTitle(false)
            ->setAllowExport(false)
            ->setShowSearchBar(false);
        return $grid;
    }
}

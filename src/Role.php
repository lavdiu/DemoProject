<?php

namespace Lavdiu\DemoApp;

use Laf\UI\Grid\PhpGrid\Column;
use Laf\UI\Grid\PhpGrid\PhpGrid;

/**
 * Class Role
 * @package Lavdiu\DemoApp
 * Main Class for Table role
 * This class inherits functionality from BaseRole.
 * It is generated only once, please include all logic and code here
 */
class Role extends Base\BaseRole
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
	 * @return Role
	 * @throws \Exception
	 */
	public static function findOne(array $keyValuePairs) : ?Role
	{
		return parent::bOfindOne($keyValuePairs);
	}
	
	/**
	 * @param array $keyValuePairs
	 * @return Role[]
	 * @throws \Exception
	 */
	public static function find(array $keyValuePairs = []) : array
	{
		return parent::bOfind($keyValuePairs);
	}

    public static function getIcon(): ?string
    {
        return 'fas fa-user-tag';
    }

    public function getRelatedGroupsGrid(): PhpGrid
    {
        $grid = new PhpGrid('group_role_list');
        $grid->setTitle('Related Groups')
            ->setRowsPerPage(20)
            ->setSqlQuery('
SELECT * FROM (
	SELECT
		  `group_role`.`id` AS group_role_id
		, `group_role`.`role_id` AS group_role_role_id
		, `role`.`label` AS role_label
		, `group_role`.`group_id` AS group_role_group_id
		, `group`.`label` AS group_label
	FROM group_role group_role
	LEFT JOIN `role` `role` ON `group_role`.`role_id` = `role`.`id`
	LEFT JOIN `group` `group` ON `group_role`.`group_id` = `group`.`id`
	WHERE 1=1  AND role.id = ' . $this->getIdVal() . '

)l1 ');

        $grid->addColumn(new Column('group_role_id', 'Id', true));
        $grid->addColumn(new Column('group_label', 'Group', true));
        $grid->addColumn(new Column('group_role_group_id', 'Grup Id', true));
        $grid->addColumn(new Column('group_role_role_id', 'Roli Id', true));
        $grid->setAllowExport(false);
        return $grid;
    }

    /**
     * @return PhpGrid
     */
    public function getRelatedUsersGrid(): PhpGrid
    {
        $grid = new PhpGrid('person_role_group_list');
        $grid->setTitle('Related Users')
            ->setRowsPerPage(20)
            ->setSqlQuery('
SELECT * FROM (
	SELECT
		  pg.`id` AS person_group_id
		, p.`name` AS person_name
	    , p.id as person_id
	FROM person_group pg
    JOIN group_role gr on pg.group_id = gr.group_id
    JOIN role r on gr.role_id = r.id
	LEFT JOIN `person` p ON pg.`person_id` = p.`id`
	WHERE 1=1  AND r.id = ' . $this->getIdVal() . '

)l1 ');

        $grid->addColumn(new Column('person_group_id', 'Id', true));
        $grid->addColumn(new Column('person_name', 'Shfrytëzuesi', true));
        $grid->addColumn(new Column('person_id', 'Person Id', true));
        $grid->setShowSearchBar(false)
            ->setAllowExport(false)
            ->setShowTitle(false);


        return $grid;
    }
}

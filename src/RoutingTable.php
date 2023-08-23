<?php

namespace Lavdiu\DemoApp;

use Laf\Database\Db;
use Laf\Util\Settings;

/**
 * Class RoutingTable
 * @package LafShell
 * Main Class for Table routing_table
 * This class inherits functionality from BaseRoutingTable.
 * It is generated only once, please include all logic and code here
 */
class RoutingTable extends Base\BaseRoutingTable
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
     * @return RoutingTable
     * @throws \Exception
     */
    public static function findOne(array $keyValuePairs): ?RoutingTable
    {
        return parent::bOfindOne($keyValuePairs);
    }

    /**
     * @param array $keyValuePairs
     * @return RoutingTable[]
     * @throws \Exception
     */
    public static function find(array $keyValuePairs): array
    {
        return parent::bOfind($keyValuePairs);
    }

    public static function getMenuAsArray()
    {
        $sql = "
WITH RECURSIVE rt AS (
    SELECT
        id
         , parent_id
         , unique_name
         , label
         , icon
         , page_file
         , is_visible
         , actions
         , ordinal
         , CAST(id AS CHAR(255)) as list_tree
         , id * COALESCE(ordinal, 1) * 10000000 AS order_tree
         , 1 AS depth
         , 0 AS active
    FROM routing_table
    WHERE 
        parent_id IS NULL
        AND COALESCE(is_visible,1) = 1

    UNION ALL

    SELECT
        ch.id
         , ch.parent_id
         , ch.unique_name
         , ch.label
         , ch.icon
         , ch.page_file
         , ch.is_visible
         , ch.actions
         , ch.ordinal
         , CONCAT(rt.list_tree, \" / \", CAST(ch.id AS CHAR)) AS list_tree
         , rt.order_tree + (COALESCE(ch.ordinal, 1) * ch.id) AS order_tree
         , rt.depth + 1 AS depth
         , 0 AS active
    FROM routing_table ch
    JOIN rt ON rt.id = ch.parent_id
    WHERE 
        COALESCE(ch.is_visible,1) = 1
)
SELECT *
FROM rt
ORDER BY order_tree

		";
        $data = Db::getAllAssoc($sql);
        $menu = [];
        foreach ($data as $row) {
            $row['items'] = [];
            $parentId = $row['parent_id'];
            if (!is_numeric($parentId)) {
                $menu[$row['id']] = $row;
                continue;
            }
            $tree = explode(' / ', $row['list_tree']);
            if (count($tree) < 3) {
                $menu[$tree[0]]['items'][$row['id']] = $row;
            } else if (count($tree) < 4) {
                $menu[$tree[0]]['items'][$tree[1]]['items'][$row['id']] = $row;
            }

        }
        return $menu;
    }

    public static function buildMenu()
    {
        $html = "";
        $menu = self::getMenuAsArray();
        foreach ($menu as $lvl1) {
            $moduleLvl1 = $lvl1['id'];
            if ($lvl1['unique_name'] != '') {
                $moduleLvl1 = $lvl1['unique_name'];
            }

            $html .= "<li class='nav-item dropdown'>";
            if (count($lvl1['items']) > 0) {
                $html .= "<a class='nav-link dropdown-toggle' href='javascript:;' data-bs-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><i class='{$lvl1['icon']}'>&nbsp;</i> {$lvl1['label']}</a>";
            } else {
                $html .= "<a class='nav-link' role='button' href='?module={$moduleLvl1}'><i class='{$lvl1['icon']}'>&nbsp;</i> {$lvl1['label']}</a>";
            }

            if (count($lvl1['items']) > 0) {
                $html .= "<ul class='dropdown-menu dropdown-menu-left'>";
                foreach ($lvl1['items'] as $lvl2) {
                    $moduleLvl2 = $lvl2['id'];
                    if ($lvl2['unique_name'] != '') {
                        $moduleLvl2 = $lvl2['unique_name'];
                    }

                    if (count($lvl2['items']) < 1) {
                        $html .= "<li><a class='dropdown-item' href='?module={$moduleLvl2}'><i class='{$lvl2['icon']}'>&nbsp;</i> {$lvl2['label']}</a></li>";
                    } else {
                        $html .= "<li class='dropdown-submenu'>";
                        $html .= "<a class='dropdown-item dropdown-toggle' href='javascript:;'><i class='{$lvl2['icon']}'>&nbsp;</i> {$lvl2['label']}</a>";
                        $html .= "<ul class='dropdown-menu'>";
                        foreach ($lvl2['items'] as $lvl3) {
                            $moduleLvl3 = $lvl3['id'];
                            if ($lvl3['unique_name'] != '') {
                                $moduleLvl3 = $lvl3['unique_name'];
                            }

                            $html .= "<a class='dropdown-item' href='?module={$moduleLvl3}'><i class='{$lvl3['icon']}'>&nbsp;</i> {$lvl3['label']}</a>";
                        }
                        $html .= "</ul>";
                    }
                }
                $html .= "</ul>";
            }
        }
        $person = Person::getLoggedUserInstance();
        return "
<nav class='navbar navbar-expand-md navbar-dark bg-dark' id='" . Settings::get('project.project_name') . "MainMenu'>
    <div class='container-fluid'>
	<a class='navbar-brand' href='?'>" . Settings::get('project.project_name') . "</a>
	<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#main-menu' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
		<span class='navbar-toggler-icon'></span>
	</button>

	<div class='collapse navbar-collapse' id='main-menu'>
		<ul class='navbar-nav me-auto'>
			{$html}
		</ul>
		<ul class='navbar-nav ms-auto'>
			<li class='nav-item dropdown'>
				<a class='nav-link dropdown-toggle' href='javascript:;' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>[" . (($person->getNameVal()) ?? 'Not Logged in') . "]<b class='caret'></b></a>
				<ul class='dropdown-menu dropdown-menu-end'>
					<li><a class='dropdown-item' href='?module=account_settings'><i class='fa fa-user-cog'></i> My Account</a></li>
					<li><a class='dropdown-item' href='?module=change_password'><i class='fa fa-lock'></i> Change password</a></li>
					<div class='dropdown-divider'></div>
					<li><a class='dropdown-item' href='?mod=reload_menu'><i class='fas fa-sync'></i> Reload Menu</a></li>
					<div class='dropdown-divider'></div>
					<li><a class='dropdown-item' href='?module=logout'><i class='fa fa-user-alt'>&nbsp;</i>Log Out</a></li>
				</ul>
			</li>
		</ul>
	</div>
</div>	
</nav>
		";
    }

    /**
     *
     */
    public static function buildAndCacheMenu(): void
    {
        try {
            $_SESSION['app_menu'] = RoutingTable::buildMenu();
        } catch (\Throwable $e) {
            $_SESSION['app_menu'] = '';
        }
    }

    /**
     * @return string|null
     */
    public static function getCachedMenu(): ?string
    {
        if (!isset($_SESSION['app_menu'])) {
            self::buildAndCacheMenu();
        }
        return $_SESSION['app_menu'];
    }

    public function isDeviceRegistrationPage(): bool
    {
        return $this->getUniqueNameVal() == 'register_new_device';
    }


    public function listAll()
    {
        $sql = "SELECT * FROM `routing_table` ORDER BY `id` ASC;";
        return Db::getAllAssoc($sql);
    }

    public function listoKryesoret()
    {
        $sql = "SELECT * FROM `routing_table` WHERE `parent_id` is NULL AND `is_visible`=1 ORDER BY `ordinal` ASC;";
        return Db::getAllAssoc($sql);
    }

    public function listoNenModulet($id)
    {
        $sql = "SELECT * FROM `routing_table` WHERE `parent_id`=%s AND `is_visible`=1 ORDER BY `ordinal` ASC;";
        return Db::getAllAssoc(sprintf($sql, ((int)$id)));
    }

    public function listoNenModuletMeHidden($id)
    {
        $sql = "SELECT * FROM `routing_table` WHERE `parent_id`=%s ORDER BY `ordinal` ASC;";
        return Db::getAllAssoc(sprintf($sql, ((int)$id)));
    }

    public static function gjyshiID($id)
    {
        $sql = "select id from routing_table where id=(select parent_id from routing_table where id=(select parent_id from routing_table where id=%s));";
        return Db::getAllAssoc(sprintf($sql, ((int)$id)));
    }
}
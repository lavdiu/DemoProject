<?php

namespace Lavdiu\DemoApp;

use Laf\Util\Settings;

/**
 * Class Ticket
 * @package Asm
 * Main Class for Table ticket
 * This class inherits functionality from BaseTicket.
 * It is generated only once, please include all logic and code here
 */
class Ticket extends Base\BaseTicket
{
    /**
     * Instructors constructor.
     * @param int $id
     */
    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->getSubjectFld()->setRequired(true);
        $this->getBodyFld()->setRequired(true);
        $this->getTicketPriorityIdFld()->setRequired(true);
        $this->translateFields();
    }


    public function translateFields()
    {

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
     * @return Ticket
     * @throws \Exception
     */
    public static function findOne(array $keyValuePairs): ?Ticket
    {
        return parent::bOfindOne($keyValuePairs);
    }

    /**
     * @param array $keyValuePairs
     * @return Ticket[]
     * @throws \Exception
     */
    public static function find(array $keyValuePairs = []): array
    {
        return parent::bOfind($keyValuePairs);
    }

    public function getTicketDetailsAsHtml(): string
    {
        $html = "
		<p><b>Id</b>: {$this->getIdVal()}</p>
		<p><b>Subject</b>: {$this->getSubjectVal()}</p>
		<p><b>Requested By</b>: {$this->getRequestedByObj()->getNameVal()}</p>
		<p><b>Priority</b>: {$this->getTicketPriorityIdObj()->getLabelVal()}</p>
		<p><b>Status</b>: {$this->getTicketStatusIdObj()->getLabelVal()}</p>
		<p><b>Category</b>: {$this->getTicketCategoryIdObj()->getLabelVal()}</p>
		<p><b>Description</b>: {$this->getBodyVal()}</p>
		<p><b>Created On</b>: {$this->getCreatedOnVal()}</p>
		<p><b>Created By</b>: {$this->getCreatedByObj()->getNameVal()}</p>
		<p><b>Final Resolution</b>: {$this->getResolutionVal()}</p>
		<p><a href='" . Settings::get('homepage') . "?module=ticket&submodule=&action=view&id={$this->getIdVal()}'>Click here for details</a></p>
		";
        return $html;
    }

    public static function getIcon(): ?string
    {
        return 'fas fa-clipboard-list';
    }
}

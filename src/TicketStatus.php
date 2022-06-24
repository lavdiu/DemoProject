<?php

namespace Lavdiu\DemoApp;

/**
 * Class TicketStatus
 * @package Lavdiu\DemoApp
 * Main Class for Table ticket_status
 * This class inherits functionality from BaseTicketStatus.
 * It is generated only once, please include all logic and code here
 */
class TicketStatus extends Base\BaseTicketStatus
{


    const    OPEN = 1;
    const    IN_PROGRESS = 2;
    const    READY_TO_TEST = 3;
    const    RESOLVED = 4;
    const    DECLINED = 5;
    const    WAITING_FOR_APPROVAL = 6;
    const    WAITING_FOR_RESPONSE = 7;

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
     * @return TicketStatus
     * @throws \Exception
     */
    public static function findOne(array $keyValuePairs): ?TicketStatus
    {
        return parent::bOfindOne($keyValuePairs);
    }

    /**
     * @param array $keyValuePairs
     * @return TicketStatus[]
     * @throws \Exception
     */
    public static function find(array $keyValuePairs = []): array
    {
        return parent::bOfind($keyValuePairs);
    }
}

<?php

namespace Lavdiu\DemoApp;

use Laf\Database\SqlErrorLoggerInterface;

/**
 * Class SqlError
 * @package Asm
 * Main Class for Table sql_error
 * This class inherits functionality from BaseSqlError.
 * It is generated only once, please include all logic and code here
 */
class SqlError extends Base\BaseSqlError implements SqlErrorLoggerInterface
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
     * @return SqlError
     * @throws \Exception
     */
    public static function findOne(array $keyValuePairs): ?SqlError
    {
        return parent::bOfindOne($keyValuePairs);
    }

    /**
     * @param array $keyValuePairs
     * @return SqlError[]
     * @throws \Exception
     */
    public static function find(array $keyValuePairs = []): array
    {
        return parent::bOfind($keyValuePairs);
    }

    public function setSqlQuery(?string $value): void
    {
        $this->setSqlQueryVal($value);
    }

    public function setErrorMessage(?string $value): void
    {
        $this->setErrorMessageVal($value);
    }

    public function setFile(?string $value): void
    {
        $this->setPageFileVal($value);
    }

    public function setLineNumber(?string $value): void
    {
        $this->setLineNumberVal($value);
    }

    public function setTraceAsString(?string $value): void
    {
        $this->setExceptionTraceVal($value);
    }

    public function setCustomMessage(?string $value): void
    {
        // TODO: Implement setCustomMessage() method.
    }

    public function getSqlQuery(): ?string
    {
        return $this->getSqlQueryVal();
    }

    public function getErrorMessage(): ?string
    {
        return $this->getErrorMessageVal();
    }

    public function getFile(): ?string
    {
        return $this->getPageFileVal();
    }

    public function getLineNumber(): ?string
    {
        return $this->getLineNumberVal();
    }

    public function getTraceAsString(): ?string
    {
        return $this->getExceptionTraceVal();
    }

    public function getCustomMessage(): ?string
    {
        return $this->getErrorMessageVal();
    }

    public function storeLogEntry(): bool
    {
        $this->store();
        return true;
    }

    public function getTableName(): string
    {
        return $this->getTable()->getName();
    }
}

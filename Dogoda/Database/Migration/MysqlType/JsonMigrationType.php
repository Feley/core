<?php


namespace Dogoda\Database\Migration\MysqlType;

use Dogoda\Database\Migration\AbstractMigrationDataType;
use Dogoda\Database\Traits\MigrationDataTypeDestructTrait;

/**
 * Class JsonMigrationType
 * @package Dogoda\Database\Migration
 */
class JsonMigrationType extends AbstractMigrationDataType
{
    use MigrationDataTypeDestructTrait;

    /**
     * @var string
     */
    private string $type='JSON';

    /**
     * StringMigrationType constructor.
     * @param string $table
     * @param string $column
     * @param $connectionName
     */
    public function __construct(string $table, string $column, $connectionName)
    {
        $this->table = $table;
        $this->column = $column;
        $this->connectionName = $connectionName;
    }
}

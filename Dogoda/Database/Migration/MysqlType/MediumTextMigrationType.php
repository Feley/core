<?php


namespace Dogoda\Database\Migration\MysqlType;

use Dogoda\Database\Migration\AbstractMigrationDataType;
use Dogoda\Database\Traits\MigrationDataTypeDestructTrait;

/**
 * Class MediumTextMigrationType
 * @package Dogoda\Database\Migration\MysqlType
 */
class MediumTextMigrationType extends AbstractMigrationDataType
{
    use MigrationDataTypeDestructTrait;


    /**
     * @var string
     */
    private string $type = 'MEDIUMTEXT';

    /**
     * MediumTextMigrationType constructor.
     * @param string $table
     * @param string $column
     * @param $connectionName
     */
    public function __construct(string $table, string $column, $connectionName)
    {
        $this->column = $column;
        $this->table = $table;
        $this->connectionName = $connectionName;
    }
}

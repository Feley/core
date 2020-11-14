<?php


namespace Dogoda\Database\Migration;

use Dogoda\Database\Migration\MysqlType\BooleanMigrationType;
use Dogoda\Database\Migration\MysqlType\DateTimeMigrationType;
use Dogoda\Database\Migration\MysqlType\IntegerMigrationType;
use Dogoda\Database\Migration\MysqlType\JsonMigrationType;
use Dogoda\Database\Migration\MysqlType\LongTextMigrationType;
use Dogoda\Database\Migration\MysqlType\MediumTextMigrationType;
use Dogoda\Database\Migration\MysqlType\PrimaryKeyMigrationType;
use Dogoda\Database\Migration\MysqlType\SmallIntMigrationType;
use Dogoda\Database\Migration\MysqlType\StringMigrationType;
use Dogoda\Database\Migration\MysqlType\TextMigrationType;
use Dogoda\Database\Migration\MysqlType\TimeStampMigrationType;
use Dogoda\Database\Migration\MysqlType\TinyintMigrationType;
use Dogoda\Database\Migration\MysqlType\TinyTextMigrationType;

/**
 * Class MigrationBuilder
 * @package Dogoda\Database\Migration
 */
class MigrationBuilder
{
    /**
     * @var string $table
     */
    private string $table;

    /**
     * @var string $connectionName
     */
    private string $connectionName;

    /**
     * MigrationBuilder constructor.
     * @param string $table
     * @param string $connectionName
     */
    public function __construct(string $table, string $connectionName)
    {
        $this->table = $table;
        $this->connectionName = $connectionName;
    }

    /**
     * @param string $column
     * @return PrimaryKeyMigrationType
     */
    public function primaryKey(string $column): PrimaryKeyMigrationType
    {
        return new PrimaryKeyMigrationType($this->table, $column, $this->connectionName);
    }

    /**
     * @param string $column
     * @return StringMigrationType
     */
    public function string(string $column): StringMigrationType
    {
        return new StringMigrationType($this->table, $column, $this->connectionName);
    }

    /**
     * @param string $column
     * @return DateTimeMigrationType
     */
    public function dateTime(string $column):DateTimeMigrationType
    {
        return new DateTimeMigrationType($this->table, $column, $this->connectionName);
    }

    /**
     * @param string $column
     * @return TextMigrationType
     */
    public function text(string $column): TextMigrationType
    {
        return new TextMigrationType($this->table, $column, $this->connectionName);
    }

    /**
     * @param string $column
     * @return MediumTextMigrationType
     */
    public function mediumText(string $column):MediumTextMigrationType
    {
        return new MediumTextMigrationType($this->table, $column, $this->connectionName);
    }

    /**
     * @param string $column
     * @return TinyTextMigrationType
     */
    public function tinyText(string $column):TinyTextMigrationType
    {
        return new TinyTextMigrationType($this->table, $column, $this->connectionName);
    }

    /**
     * @param string $column
     * @return TinyintMigrationType
     */
    public function tinyint(string $column): TinyintMigrationType
    {
        return new TinyintMigrationType($this->table, $column, $this->connectionName);
    }
    /**
     * @param string $column
     * @return IntegerMigrationType
     */
    public function integer(string $column): IntegerMigrationType
    {
        return new IntegerMigrationType($this->table, $column, $this->connectionName);
    }

    /**
     * @param string $column
     * @return SmallIntMigrationType
     */
    public function smallInt(string $column):SmallIntMigrationType
    {
        return new SmallIntMigrationType($this->table, $column, $this->connectionName);
    }

    /**
     * @param string $column
     * @return BooleanMigrationType
     */
    public function boolean(string $column):BooleanMigrationType
    {
        return new BooleanMigrationType($this->table, $column, $this->connectionName);
    }

    /**
     * @param string $column
     * @return JsonMigrationType
     */
    public function json(string $column):JsonMigrationType
    {
        return new JsonMigrationType($this->table, $column, $this->connectionName);
    }

    /**
     * @return TimeStampMigrationType
     */
    public function timestamp():TimeStampMigrationType
    {
        return new TimeStampMigrationType($this->table, $this->connectionName);
    }

    /**
     * @param string $column
     * @return LongTextMigrationType
     */
    public function longText(string $column): LongTextMigrationType
    {
        return new LongTextMigrationType($this->table, $column, $this->connectionName);
    }
}

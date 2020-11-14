<?php


namespace Dogoda\Database\Migration;

/**
 * Class MigrationStorage
 * @package Dogoda\Database\Migration
 */
class MigrationStorage
{


    /**
     * @var array
     */
    private static array $migrationObjects = [];


    /**
     * @param $table
     * @param $connectionName
     * @param $attributes
     */
    public static function add(string$table, string $connectionName, array $attributes): void
    {
        $attributes['connection_name']=$connectionName;
        static::$migrationObjects[$table][] = $attributes;
    }

    /**
     * @param string $table
     * @return mixed
     */
    public static function get(string $table)
    {
        return static::$migrationObjects[$table];
    }

    /**
     * @return array
     */
    public static function all(): array
    {
        return static::$migrationObjects;
    }
}

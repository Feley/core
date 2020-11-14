<?php


namespace Dogoda\Database\Migration;

use Bin\Components\ColorConsole;

/**
 * Class CallMigrationObjects
 * @package Dogoda\Database\Migration
 */
class CallMigrationObjects
{
    private static function getMigrationPaths(): array
    {
        $migration = new Migration();
        return $migration->getPaths();
    }



    public static function create():void
    {
        foreach (self::getMigrationPaths() as $migrationPath) {
            CreateMigrationObject::fromFile($migrationPath)->create();
        }
    }

    public static function drop():void
    {
        foreach (self::getMigrationPaths() as $migrationPath) {
            echo CreateMigrationObject::fromFile($migrationPath)->drop();
        }

        echo ColorConsole::getInstance()->getColoredString('command executed', 'green');
    }
}

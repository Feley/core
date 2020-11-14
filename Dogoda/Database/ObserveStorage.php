<?php


namespace Dogoda\Database;

/**
 * Class ObserveStorage
 * @package Dogoda\Database
 */
class ObserveStorage
{
    /**
     * @var array
     */
    private static array $storage = [];

    /**
     * @param Model $model
     * @param $value
     */
    public static function add(Model $model, $value):void
    {
        self::$storage[get_class($model)] []= $value;
    }

    /**
     * @return array
     */
    public static function all():array
    {
        return self::$storage;
    }

    /**
     * @param Model $model
     * @return array|null
     */
    public static function get(Model $model):?array
    {
        return self::$storage[get_class($model)] ?? null;
    }
}

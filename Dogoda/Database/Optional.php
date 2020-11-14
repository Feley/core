<?php


namespace Dogoda\Database;

/**
 * Class Optional
 * @package Dogoda\Database
 */
class Optional
{

    /**
     * @var object
     */
    private $data;

    /**
     * Optional constructor.
     * @param object $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if (method_exists($this->data, $name)) {
            return $this->data->$name(...$arguments);
        }
        return null;
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->data->$name=$value;
    }

    /**
     * @param $name
     */
    public function __unset($name)
    {
        unset($this->data->$name);
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data->$name);
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function __get($name)
    {
        return $this->data->$name ?? null;
    }
}

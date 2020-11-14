<?php


namespace Dogoda\Route\Validators;

use App\Application\Routervalidators\Validator;

/**
 * Class AbstractValidateRouter
 * @package Dogoda\Route\Validators
 */
abstract class AbstractValidateRouter
{
    /**
     * @param $value
     * @param $type
     * @return bool
     *
     */

    public function validate($value, $type): bool
    {
        $class=$this->getTypes()[$type];
        return (new $class())->validate($value);
    }

    /**
     * @return mixed
     */
    private function getTypes(): array
    {
        return array_merge($this->type, (new Validator())->getTypes());
    }
}

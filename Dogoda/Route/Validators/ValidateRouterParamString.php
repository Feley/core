<?php


namespace Dogoda\Route\Validators;

use App\Interfaces\ValidateRouterInterface;

/**
 * Class ValidateRouterParamString
 * @package Dogoda\Route\Validators
 */
class ValidateRouterParamString implements ValidateRouterInterface
{

    /**
     * @param $value
     * @return bool
     */
    public function validate($value): bool
    {
        if (is_numeric($value)) {
            return false;
        }
        return is_string($value);
    }
}

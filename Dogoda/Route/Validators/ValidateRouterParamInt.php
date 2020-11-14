<?php


namespace Dogoda\Route\Validators;

use App\Interfaces\ValidateRouterInterface;

/**
 * Class ValidateRouterParamInt
 * @package Dogoda\Route
 */
class ValidateRouterParamInt implements ValidateRouterInterface
{


    /**
     * @param $value
     * @return bool
     */
    public function validate($value): bool
    {
        return is_numeric($value);
    }
}

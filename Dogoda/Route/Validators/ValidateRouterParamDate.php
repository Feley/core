<?php


namespace Dogoda\Route\Validators;

use App\Interfaces\ValidateRouterInterface;

/**
 * Class ValidateRouterParamDate
 * @package Dogoda\Route\Validators
 */
class ValidateRouterParamDate implements ValidateRouterInterface
{

    /**
     * @param $value
     * @return bool
     */
    public function validate($value): bool
    {
        return (bool)strtotime($value);
    }
}

<?php


namespace Dogoda\Route\Validators;

/**
 * Class ValidateRouter
 * @package Dogoda\Route\Validators
 */
class ValidateRouter extends AbstractValidateRouter
{

    /**
     * @var array|string[]
     */
    protected array $type = [

        'int' => ValidateRouterParamInt::class,
        'string' => ValidateRouterParamString::class,
        'date' => ValidateRouterParamDate::class
    ];
}

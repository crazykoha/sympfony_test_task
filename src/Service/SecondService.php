<?php


namespace App\Service;


use App\Validators\FirstServiceValidator;
use App\Validators\ValidatorInterface;

class FirstService extends AbstractService
{
    public function getProtocolClass(): string
    {
        return "App\Service\ServiceProtocol\RestApiProtocol";
    }

    public function getValidator(): ValidatorInterface
    {
        return new FirstServiceValidator();
    }
}
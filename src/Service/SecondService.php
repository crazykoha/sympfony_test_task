<?php


namespace App\Service;


use App\Service\ServiceProtocol\GrpcProtocol;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class SecondService extends AbstractService
{
    public function getProtocolClass(): string
    {
        return GrpcProtocol::class;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('field1', new Assert\Type('string'));
        $metadata->addPropertyConstraint('field2', new Assert\Type('bool'));
        $metadata->addPropertyConstraint('field3', new Assert\Type('int'));
    }
}
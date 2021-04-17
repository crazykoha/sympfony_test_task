<?php


namespace App\Service;



use App\Service\ServiceProtocol\HttpProtocol;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class ThirdService extends AbstractService
{
    public function getProtocolClass(): string
    {
        return HttpProtocol::class;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('field1', new Assert\Type('string'));
        $metadata->addPropertyConstraint('field2', new Assert\Type('bool'));
        $metadata->addPropertyConstraint('field3', new Assert\All([
            'constraints' => [
                new Assert\Type(['string', 'int'])
            ],
        ]));
    }
}
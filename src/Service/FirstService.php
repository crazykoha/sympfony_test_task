<?php


namespace App\Service;


use App\Service\ServiceProtocol\RestApiProtocol;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class FirstService extends AbstractService
{

    /**
     * @var
     */
    public $field1;

    /**
     * @var
     */
    public $field2;

    /**
     * @var
     */
    public $field3;

    /**
     * @return string
     */
    public function getProtocolClass(): string
    {
        return RestApiProtocol::class;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('field1', new Assert\Type('string'));
        $metadata->addPropertyConstraint('field2', new Assert\Type('bool'));
        $metadata->addPropertyConstraint('field3', new Assert\All([
            'constraints' => [
                new Assert\Type('string')
            ],
        ]));
    }
}
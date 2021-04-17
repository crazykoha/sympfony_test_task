<?php


namespace App\Service;


use App\Service\ServiceProtocol\ProtocolInterface;
use Symfony\Component\Validator\Mapping\ClassMetadata;

abstract class AbstractService
{
    protected $protocol;

    protected $source;

    public abstract function getProtocolClass(): string;

    public abstract static function loadValidatorMetadata(ClassMetadata $metadata);

    public function __construct()
    {
        $protocolClass = $this->getProtocolClass();
        $this->protocol = new $protocolClass();
    }

    public function getProtocol():ProtocolInterface
    {
        return $this->protocol;
    }
}
<?php


namespace App\Service;


class ServiceFactory
{

    /**
     * @var string[]
     * Сюда добавлять новые микросервисы
     */
    private static $services = [
        'first' => "App\Service\FirstService",
        'second' => "App\Service\SecondService",
        'third' => "App\Service\ThirdService"
    ];

    /**
     * @param string $name
     * @return AbstractService
     * Универсальный метод для получения сервисов
     */
    public function getService(string $name): AbstractService
    {
        if (array_key_exists($name, self::$services)) {
            return new self::$services[$name]();
        }
    }
}
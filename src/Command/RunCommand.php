<?php


namespace App\Command;

use App\Service\ServiceFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Validator\ValidatorBuilder;

class RunCommand extends Command
{
    protected static $defaultName = 'app:run';

    protected function configure()
    {
        $this->setDescription('Запускает тестовое задание')
            ->setHelp('Запускает тестовое задание с тестовыми данными для проверки работоспособности.')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $factory = new ServiceFactory();
        $service = $factory->getService("first");
        $service->field1 = [123];
        $validator = (new ValidatorBuilder())->enableAnnotationMapping(true)->addDefaultDoctrineAnnotationReader()->getValidator();
        $errors = $validator->validate($service);
        if (count($errors) != 0) {
            print_r($errors);
            return Command::FAILURE;
        }
        return Command::SUCCESS;
    }
}
<?php
declare(strict_types=1);

use ToDoApp\Factories\LoggerFactory;
use ToDoApp\Factories\PDOFactory;
use ToDoApp\Factories\RendererFactory;
use DI\ContainerBuilder;
use Psr\Log\LoggerInterface;
use Slim\Views\PhpRenderer;

return function (ContainerBuilder $containerBuilder) {
    $container = [];

    $container[LoggerInterface::class] = DI\factory(LoggerFactory::class);
    $container[PhpRenderer::class] = DI\factory(RendererFactory::class);
    $container[PDO::class] = DI\factory(\ToDoApp\Factories\PDOFactory::class);
    $containerBuilder->addDefinitions($container);
};

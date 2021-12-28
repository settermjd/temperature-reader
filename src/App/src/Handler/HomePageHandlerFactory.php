<?php

declare(strict_types=1);

namespace App\Handler;

use App\Service\Database;
use Mezzio\Template\TemplateRendererInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;

use function get_class;

class HomePageHandlerFactory
{
    public function __invoke(ContainerInterface $container): RequestHandlerInterface
    {
        $template = $container->has(TemplateRendererInterface::class)
            ? $container->get(TemplateRendererInterface::class)
            : null;

        $database = $container->has(Database::class)
            ? $container->get(Database::class)
            : null;

        return new HomePageHandler($template, $database);
    }
}

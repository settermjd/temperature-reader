<?php

declare(strict_types=1);

namespace App\Service;


use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DatabaseFactory
{
    public function __invoke(ContainerInterface $container): Database
    {
        $dbh = new \PDO(sprintf('sqlite:%s/data/database/db.sqlite', __DIR__ . '/../../../../'));

        return new Database($dbh);
    }
}

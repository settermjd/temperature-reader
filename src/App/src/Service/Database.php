<?php

declare(strict_types=1);

namespace App\Service;

class Database
{
    private \PDO $dbh;

    public function __construct(\PDO $dbh)
    {
        $this->dbh = $dbh;
    }

    public function fetchAll(): array
    {
        $query = 'SELECT date_time, temp
            FROM measurements
            ORDER BY date_time DESC';

        $sth = $this->dbh->prepare(
            $query,
            [
                \PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY
            ]
        );
        $sth->execute();

        return $sth->fetchAll();
    }
}

<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Repository\Db;


use PDO;

class AppPdo extends PDO
{
    public function __construct()
    {
        parent::__construct(
            'mysql:host=localhost;dbname=db',
            'mysql_user',
            '^v3J8e=p]o{dz+2ZbBC)0a42[/XJ<LXs]#',
            [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]);
    }
}
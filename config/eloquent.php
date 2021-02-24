<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => $_ENV['DATABASE_DRIVER'],
    'host'      => $_ENV['DATABASE_HOST'],
    'database'  => $_ENV['DATABASE_NAME'],
    'username'  => $_ENV['DATABASE_USERNAME'],
    'password'  => $_ENV['DATABASE_PASSWORD'],
    'charset'   => $_ENV['DATABASE_CHARSET'],
    'collation' => $_ENV['DATABASE_COLLATION'],
    'prefix'    => $_ENV['DATABASE_PREFIX'],
]);


use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

$capsule->setEventDispatcher(new Dispatcher(new Container));
$capsule->setAsGlobal();
$capsule->bootEloquent();
Illuminate\Pagination\Paginator::currentPageResolver(fn() => $_GET['page'] ?? 1);

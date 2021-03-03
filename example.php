<?php

require_once __DIR__.'/vendor/autoload.php';

use League\Container\Container;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\EventDispatcher\ListenerProviderInterface;
use Simtel\PSR14Example\App;
use Simtel\PSR14Example\EventDispatcher;
use Simtel\PSR14Example\ListenerProvider;

$container = new Container();
$container->add(App::class)->addArgument(EventDispatcherInterface::class);
$container->add(EventDispatcherInterface::class, EventDispatcher::class)->addArgument(ListenerProviderInterface::class);
$container->add(ListenerProviderInterface::class, ListenerProvider::class);

$app = $container->get(App::class);

var_dump($app);

$app->execute(); //Event->cnt = 400;

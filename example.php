<?php

require_once __DIR__ . '/vendor/autoload.php';

use League\Container\Container;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\EventDispatcher\ListenerProviderInterface;
use Psr\EventDispatcher\StoppableEventInterface;
use Simtel\PSR14Example\App;
use Simtel\PSR14Example\EventDispatcher;
use Simtel\PSR14Example\Events\EventOne;
use Simtel\PSR14Example\Events\EventStoppable;
use Simtel\PSR14Example\ListenerProvider;

$container = new Container();
$container->add(App::class)
    ->addArgument(EventOne::class)
    ->addArgument(StoppableEventInterface::class)
    ->addArgument(EventDispatcherInterface::class);

$container->add(EventOne::class);
$container->add(StoppableEventInterface::class, EventStoppable::class);
$container->add(EventDispatcherInterface::class, EventDispatcher::class)->addArgument(ListenerProviderInterface::class);
$container->add(ListenerProviderInterface::class, ListenerProvider::class);

$app = $container->get(App::class);

var_dump($app);

$app->execute();

var_dump(get_class($app->eventStop));


var_dump($app->eventOne);
var_dump($app->eventStop);



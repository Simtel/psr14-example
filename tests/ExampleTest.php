<?php


use Mockery\Adapter\Phpunit\MockeryTestCase;
use Simtel\PSR14Example\App;
use Simtel\PSR14Example\EventDispatcher;
use Simtel\PSR14Example\ListenerProvider;

class ExampleTest extends MockeryTestCase
{

    public function testEventCnt(): void
    {
        $app = new App(
            new EventDispatcher(
                new ListenerProvider()
            )
        );

        $cnt = $app->execute();

        self::assertEquals(400, $cnt);

    }

}
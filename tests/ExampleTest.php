<?php


use Mockery\Adapter\Phpunit\MockeryTestCase;
use Psr\EventDispatcher\StoppableEventInterface;
use Simtel\PSR14Example\App;
use Simtel\PSR14Example\EventDispatcher;
use Simtel\PSR14Example\Events\EventOne;
use Simtel\PSR14Example\Events\EventStoppable;
use Simtel\PSR14Example\ListenerProvider;

class ExampleTest extends MockeryTestCase
{

    public function testNormalWork(): void
    {
        $app = new App (
            new EventOne(),
            new EventStoppable(),
            new EventDispatcher(
                new ListenerProvider()
            )
        );

        $app->execute();

        $cnt = $app->eventOne->cnt;
        $isModified = $app->eventStop->isModified;
        self::assertEquals(400, $cnt);
        self::assertFalse($isModified);

    }

    public function testNoStop(): void
    {

        $eventStop = Mockery::mock(StoppableEventInterface::class)
            ->shouldReceive('isPropagationStopped')
            ->andReturn(false)
            ->getMock();
        $eventStop->shouldReceive('isModified')->andReturn(true);
        $app = new App (
            new EventOne(),
            $eventStop,
            new EventDispatcher(
                new ListenerProvider()
            )
        );

        $app->execute();

        $cnt = $app->eventOne->cnt;
        $isModified = $app->eventStop->isModified();
        self::assertEquals(400, $cnt);
        self::assertTrue($isModified);

    }

}
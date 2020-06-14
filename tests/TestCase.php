<?php

namespace App\Tests;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidFactory;
use Ramsey\Uuid\UuidInterface;

/**
 * Class TestCase
 *
 * @package App\Tests\Util
 */
abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * Sets the expected responses from `Uuid::uuid1()`.
     *
     * If you're using this method, make sure to call `clearUuid()` in tearDown.
     *
     * @param array $uuid
     */
    protected function setUuid4Values(UuidInterface $uuid)
    {
        $factoryMock = \Mockery::mock(UuidFactory::class);
        $factoryMock->shouldReceive('fromString')
            ->andReturn($uuid);
        Uuid::setFactory($factoryMock);
    }
}

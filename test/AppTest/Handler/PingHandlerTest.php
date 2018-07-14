<?php

declare(strict_types=1);

namespace AppTest\Handler;

use App\Handler\PingHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

class PingHandlerTest extends TestCase
{
    public function testResponse()
    {
        $pingHandler = new PingHandler();
        $response = $pingHandler->handle(
            $this->prophesize(ServerRequestInterface::class)->reveal()
        );

        $json = json_decode((string) $response->getBody());

        $this->assertInstanceOf(Response::class, $response);
        $this->assertTrue(isset($json->ack));
    }
}

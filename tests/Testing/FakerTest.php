<?php

namespace Laravie\Codex\Tests\Testing;

use PHPUnit\Framework\TestCase;
use Laravie\Codex\Testing\Faker;
use Laravie\Codex\Tests\Acme\Client;
use Laravie\Codex\Tests\Acme\Request;

class ClientTest extends TestCase
{
    /** @test */
    public function it_can_test_send_api_request_using_faker()
    {
        $faker = Faker::create()
                    ->send('POST', [], 'foo=bar')
                    ->expectEndpointIs('https://acme.laravie/webhook')
                    ->shouldResponseWith(200, 'OK');

        $request = new Request();
        $request->setClient(new Client($faker->http()));

        $response = $request->send('post', 'https://acme.laravie/webhook', [], ['foo' => 'bar']);

        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame('OK', $response->getBody());
    }
}

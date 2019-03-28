<?php

namespace Laravie\Codex\Tests;

use Mockery as m;
use PHPUnit\Framework\TestCase;
use Laravie\Codex\Testing\Faker;
use Laravie\Codex\Tests\Acme\Client;
use Laravie\Codex\Contracts\Endpoint;
use Laravie\Codex\Tests\Acme\Request;
use Laravie\Codex\Contracts\Client as ClientContract;
use Laravie\Codex\Contracts\Request as RequestContract;

class RequestTest extends TestCase
{
    /**
     * Teardown the test environment.
     */
    protected function tearDown(): void
    {
        m::close();
    }

    /** @test */
    public function it_define_http_methods_as_consts()
    {
        $this->assertSame('GET', RequestContract::METHOD_GET);
        $this->assertSame('POST', RequestContract::METHOD_POST);
        $this->assertSame('PATCH', RequestContract::METHOD_PATCH);
        $this->assertSame('PUT', RequestContract::METHOD_PUT);
        $this->assertSame('DELETE', RequestContract::METHOD_DELETE);
    }

    /** @test */
    public function it_has_proper_signature()
    {
        $stub = new Request();
        $stub->setClient($client = m::mock(ClientContract::class));

        $this->assertInstanceOf(RequestContract::class, $stub);
    }

    /** @test */
    public function it_can_send_request()
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
        $this->assertSame(200, $response->getStatusCode());
    }

    /** @test */
    public function it_can_create_instance_of_endpoint()
    {
        $stub = Request::to('https://laravel.com/docs/5.4?search=controller');

        $this->assertInstanceOf(Endpoint::class, $stub);
        $this->assertSame('https://laravel.com', $stub->getUri());
        $this->assertSame(['docs', '5.4'], $stub->getPath());
        $this->assertSame(['search' => 'controller'], $stub->getQuery());
    }
}

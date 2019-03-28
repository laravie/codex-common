<?php

namespace Laravie\Codex\Tests\Acme;

use Laravie\Codex\Common\Endpoint;
use Laravie\Codex\Common\Response;
use Psr\Http\Message\ResponseInterface;
use Laravie\Codex\Contracts\Client as ClientContract;
use Laravie\Codex\Contracts\Response as ResponseContract;

class Request implements \Laravie\Codex\Contracts\Request
{
    /**
     * Set Codex Client.
     *
     * @param  \Laravie\Codex\Contracts\Client  $client
     *
     * @return $this
     */
    public function setClient(ClientContract $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Send Webhook request.
     *
     * @param  string  $method
     * @param  \Laravie\Codex\Contracts\Endpoint|string  $url
     * @param  array  $headers
     * @param  \Psr\Http\Message\StreamInterface|\Laravie\Codex\Payload|array|null  $body
     *
     * @return \Laravie\Codex\Contracts\Response
     */
    public function send(string $method, $url, array $headers = [], $body = []): ResponseContract
    {
        return $this->responseWith(
            $this->client->send(strtoupper($method), new Endpoint($url), $headers, $body)
        );
    }

    /**
     * Resolve the responder class.
     *
     * @param  \Psr\Http\Message\ResponseInterface  $message
     *
     * @return \Laravie\Codex\Contracts\Response
     */
    protected function responseWith(ResponseInterface $message): ResponseContract
    {
        return new Response($message);
    }
}

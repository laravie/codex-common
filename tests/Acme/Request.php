<?php

namespace Laravie\Codex\Tests\Acme;

use Laravie\Codex\Common\Endpoint;
use Laravie\Codex\Common\Response;
use Laravie\Codex\Contracts\Response as ResponseContract;
use Psr\Http\Message\ResponseInterface;

class Request extends \Laravie\Codex\Common\Request
{
    /**
     * Send Webhook request.
     *
     * @param  \Laravie\Codex\Contracts\Endpoint|string  $url
     * @param  \Psr\Http\Message\StreamInterface|\Laravie\Codex\Payload|array|null  $body
     */
    public function send(string $method, $url, array $headers = [], $body = []): ResponseContract
    {
        return $this->responseWith(
            $this->client->send(strtoupper($method), new Endpoint($url), $headers, $body)
        );
    }

    /**
     * Resolve the responder class.
     */
    protected function responseWith(ResponseInterface $message): ResponseContract
    {
        return new Response($message);
    }
}

<?php

namespace Laravie\Codex\Contracts;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

interface Client
{
    /**
     * Send the HTTP request.
     *
     * @param  \Laravie\Codex\Contracts\Endpoint  $uri
     * @param  \Psr\Http\Message\StreamInterface|\Laravie\Codex\Common\Payload|array|null  $body
     */
    public function send(string $method, Endpoint $uri, array $headers = [], $body = []): ResponseInterface;

    /**
     * Stream (multipart) the HTTP request.
     *
     * @param  \Laravie\Codex\Contracts\Endpoint  $uri
     */
    public function stream(string $method, Endpoint $uri, array $headers, StreamInterface $stream): ResponseInterface;
}

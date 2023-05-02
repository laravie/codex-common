<?php

namespace Laravie\Codex\Tests\Acme;

use Http\Client\Common\HttpMethodsClient;
use Laravie\Codex\Common\HttpClient;

class Client implements \Laravie\Codex\Contracts\Client
{
    use HttpClient;

    /**
     * Construct a new client.
     */
    public function __construct(HttpMethodsClient $http)
    {
        $this->http = $http;
    }

    /**
     * Prepare request headers.
     */
    protected function prepareRequestHeaders(array $headers = []): array
    {
        return $headers;
    }
}

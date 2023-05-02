<?php

namespace Laravie\Codex\Contracts;

interface Sanitizer
{
    /**
     * Add sanitization rules.
     *
     * @param  string|array  $group
     * @param  \Laravie\Codex\Contracts\Cast  $cast
     * @return $this
     */
    public function add($group, Cast $cast);

    /**
     * Sanitize request.
     */
    public function from(array $inputs, array $group = []): array;

    /**
     * Sanitize response.
     */
    public function to(array $inputs, array $group = []): array;
}

<?php

namespace Laravie\Codex\Contracts;

interface Filterable
{
    /**
     * Check if filterable exists.
     *
     * @return bool
     */
    public function hasFilterable(): bool;

    /**
     * Set filterable.
     *
     * @param  \Laravie\Codex\Contracts\Sanitizer|null  $filterable
     *
     * @return void
     */
    public function setFilterable(?Sanitizer $filterable): void;

    /**
     * Get filterable.
     *
     * @return \Laravie\Codex\Contracts\Sanitizer|null
     */
    public function getFilterable(): ?Sanitizer;
}

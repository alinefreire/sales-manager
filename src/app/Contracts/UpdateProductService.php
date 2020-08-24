<?php


namespace App\Contracts;


/**
 * Interface UpdateProductService
 * @package App\Contracts
 */
interface UpdateProductService
{
    /**
     * @param  string  $id
     * @param  array  $attributes
     * @return bool
     */
    public function update(string $id, array $attributes): bool;
}

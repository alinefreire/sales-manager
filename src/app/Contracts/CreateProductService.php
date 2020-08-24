<?php


namespace App\Contracts;


use App\Models\Product;

/**
 * Interface CreateProductService
 * @package App\Contracts
 */
interface CreateProductService
{
    /**
     * @param  array  $attributes
     * @return Product
     */
    public function create(array $attributes): Product;
}

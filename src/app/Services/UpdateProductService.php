<?php

namespace App\Services;

use App\Contracts\UpdateProductService as UpdateProductServiceContract;
use App\Repositories\ProductRepository;
use Illuminate\Support\Fluent;

/**
 * Class UpdateProductService
 * @package App\Services
 */
class UpdateProductService implements UpdateProductServiceContract
{
    /**
     * @var ProductRepository
     */
    private ProductRepository $repository;

    /**
     * UpdateProductService constructor.
     * @param  ProductRepository  $repository
     */
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param  string  $id
     * @param  array  $attributes
     * @return mixed
     */
    public function update(string $id, array $attributes)
    {
        $payload  = new Fluent($attributes);

        $product = $this->repository->findOrFail($id);

        return $product->update($payload->toArray());
    }
}

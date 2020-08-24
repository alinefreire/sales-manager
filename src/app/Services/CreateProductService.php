<?php

namespace App\Services;

use App\Contracts\CreateProductService as CreateProductServiceContract;
use App\Contracts\ProductRepository;
use App\Models\Product;
use Illuminate\Support\Fluent;

/**
 * Class CreateProductService
 * @package App\Services
 */
class CreateProductService implements CreateProductServiceContract
{
    /**
     * @var ProductRepository
     */
    private ProductRepository $repository;

    /**
     * CreateProductService constructor.
     * @param  ProductRepository  $repository
     */
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param  array  $attributes
     * @return Product
     */
    public function create(array $attributes): Product
    {
        $payload = new Fluent($attributes);
        return $this->repository->skipPresenter()->create($payload->toArray());
    }
}

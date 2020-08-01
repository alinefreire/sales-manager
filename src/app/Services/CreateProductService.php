<?php

namespace App\Services;

use App\Contracts\CreateProductService as CreateProductServiceContract;
use App\Repositories\ProductRepository;
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
     * @return mixed
     */
    public function create(array $attributes)
    {
        $payload  = new Fluent($attributes);
        return $this->repository->skipPresenter()->create($payload->toArray());
    }
}

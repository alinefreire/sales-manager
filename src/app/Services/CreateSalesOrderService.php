<?php

namespace App\Services;

use App\Models\SalesOrder;
use App\Repositories\SalesOrderRepository;
use App\Contracts\CreateSalesOrderService as CreateSalesOrderServiceContract;
use Illuminate\Support\Fluent;

/**
 * Class CreateSalesOrderService
 * @package App\Services
 */
class CreateSalesOrderService implements CreateSalesOrderServiceContract
{
    /**
     * @var SalesOrderRepository
     */
    private SalesOrderRepository $repository;

    /**
     * SalesOrderRepository constructor.
     * @param  SalesOrderRepository  $repository
     */
    public function __construct(SalesOrderRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param  array  $attributes
     * @return mixed
     */
    public function create(array $attributes): SalesOrder
    {
        $payload = new Fluent($attributes);

        return $this->repository->skipPresenter()->create($payload->toArray());
    }
}

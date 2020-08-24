<?php

namespace App\Services;

use App\Contracts\CustomerRepository;
use App\Contracts\UpdateSalesOrderService as UpdateSalesOrderServiceContract;
use App\Models\Customer;
use App\Models\SalesOrder;
use App\Repositories\SalesOrderRepository;
use Illuminate\Support\Fluent;

/**
 * Class UpdateSalesOrderService
 * @package App\Services
 */
class UpdateSalesOrderService implements UpdateSalesOrderServiceContract
{
    /**
     * @var SalesOrderRepository
     */
    private SalesOrderRepository $repository;

    /**
     * UpdateSalesOrderService constructor.
     * @param  SalesOrderRepository  $repository
     */
    public function __construct(SalesOrderRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param  string  $id
     * @param  array  $attributes
     * @return SalesOrder
     */
    public function update(string $id, array $attributes): SalesOrder
    {
        $payload = new Fluent($attributes);

        $orderService = app(SalesOrderService::class);

        $order = $orderService->findById($id);

        $order->update($payload->toArray());

        return $order;
    }


}

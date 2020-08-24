<?php


namespace App\Contracts;


use App\Models\SalesOrder;

/**
 * Interface CreateSalesOrderService
 * @package App\Contracts
 */
interface CreateSalesOrderService
{
    /**
     * @param  array  $attributes
     * @return SalesOrder
     */
    public function create(array $attributes): SalesOrder;
}

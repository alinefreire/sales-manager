<?php


namespace App\Contracts;


use App\Models\SalesOrder;

/**
 * Interface UpdateCustomerService
 * @package App\Contracts
 */
interface UpdateSalesOrderService
{
    /**
     * @param  string  $id
     * @param  array  $attributes
     * @return SalesOrder
     */
    public function update(string $id, array $attributes): SalesOrder;
}

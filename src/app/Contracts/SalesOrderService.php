<?php

namespace App\Contracts;

use App\Models\SalesOrder;
use Throwable;

/**
 * Interface SalesOrderService
 *
 * @package App\Contracts
 */
interface SalesOrderService
{
    /**
     * Paginate
     *
     * @param  int|null  $limit
     * @param  array  $columns
     * @param  string  $method
     * @return mixed
     */
    public function paginate($limit = null, array $columns = ['*'], $method = 'paginate'): array;

    /**
     * @param  false  $criteria
     * @return array
     */
    public function paginateByCriteria($criteria = false): array;


    /**
     * @param  string  $id
     * @return SalesOrder
     */
    public function findById(string $id): SalesOrder;

    /**
     * @param  string  $id
     * @return bool
     * @throws Throwable
     */
    public function deleteById(string $id): bool;

}

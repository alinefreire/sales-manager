<?php

namespace App\Contracts;

use App\Models\Customer;
use Throwable;

/**
 * Interface CustomerService
 *
 * @package App\Contracts
 */
interface CustomerService
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
     * @param  string  $id
     * @return Customer
     */
    public function findById(string $id): Customer;

    /**
     * @param  string  $id
     * @return bool
     * @throws Throwable
     */
    public function deleteById(string $id): bool;

}

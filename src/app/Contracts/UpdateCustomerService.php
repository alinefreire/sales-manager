<?php


namespace App\Contracts;


use App\Models\Customer;

/**
 * Interface UpdateCustomerService
 * @package App\Contracts
 */
interface UpdateCustomerService
{
    /**
     * @param  string  $id
     * @param  array  $attributes
     * @return Customer
     */
    public function update(string $id, array $attributes): Customer;
}

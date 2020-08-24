<?php


namespace App\Contracts;


use App\Models\Customer;

/**
 * Interface CreateCustomerService
 * @package App\Contracts
 */
interface CreateCustomerService
{
    /**
     * @param  array  $attributes
     * @return Customer
     */
    public function create(array $attributes): Customer;
}

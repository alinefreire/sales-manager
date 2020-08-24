<?php

namespace App\Contracts;

use App\Models\Customer;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface SalesOrderRepository.
 *
 * @package namespace App\Contracts;
 */
interface CustomerRepository extends RepositoryInterface
{
    /**
     * @param  string  $name
     * @return Customer
     */
    public function findByName(string $name): Customer;

}

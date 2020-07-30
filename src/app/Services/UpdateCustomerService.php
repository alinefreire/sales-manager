<?php

namespace App\Services;

use App\Contracts\UpdateCustomerService as UpdateCustomerServiceContract;
use App\Repositories\CustomerRepository;
use Illuminate\Support\Fluent;

/**
 * Class UpdateCustomerService
 * @package App\Services
 */
class UpdateCustomerService implements UpdateCustomerServiceContract
{
    /**
     * @var CustomerRepository
     */
    private CustomerRepository $repository;

    /**
     * UpdateCustomerService constructor.
     * @param  CustomerRepository  $repository
     */
    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param  string  $id
     * @param  array  $attributes
     * @return mixed
     */
    public function update(string $id, array $attributes)
    {
        $payload  = new Fluent($attributes);

        $customer = $this->repository->findOrFail($id);

        $customer->update($payload->toArray());

        $customer->addresses()->associate($payload->get('address'))->update();

        return $customer;
    }
}

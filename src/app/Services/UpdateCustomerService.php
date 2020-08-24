<?php

namespace App\Services;

use App\Contracts\CustomerRepository;
use App\Contracts\UpdateCustomerService as UpdateCustomerServiceContract;
use App\Models\Customer;
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
     * @return Customer
     */
    public function update(string $id, array $attributes): Customer
    {
        $payload = new Fluent($attributes);

        $customerService = app(CustomerService::class);

        $customer = $customerService->findById($id);

        $customer->update($payload->toArray());

        $customer->addresses()->associate($payload->get('address'))->update();

        return $customer;
    }


}

<?php

namespace App\Services;

use App\Contracts\CreateCustomerService as CreateCustomerServiceContract;
use App\Contracts\CustomerRepository;
use App\Models\Customer;
use Illuminate\Support\Fluent;


/**
 * Class CreateCustomerService
 * @package App\Services
 */
class CreateCustomerService implements CreateCustomerServiceContract
{
    /**
     * @var CustomerRepository
     */
    private CustomerRepository $repository;

    /**
     * CreateCustomerService constructor.
     * @param  CustomerRepository  $repository
     */
    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param  array  $attributes
     * @return Customer
     */
    public function create(array $attributes): Customer
    {
        $payload = new Fluent($attributes);

        $customer = $this->repository->skipPresenter()->create($payload->toArray());

        $customer->addresses()->associate($payload->get('address'))->save();

        return $customer;
    }
}

<?php

namespace App\Services;

use App\Contracts\CreateCustomerService as CreateCustomerServiceContract;
use App\Repositories\CustomerRepository;
use Illuminate\Support\Fluent;

class CreateCustomerService implements CreateCustomerServiceContract
{
    private CustomerRepository $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param  array  $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        $payload  = new Fluent($attributes);

        $customer = $this->repository->skipPresenter()->create($payload->toArray());

        $customer->addresses()->associate($payload->get('address'))->save();

        return $customer;
    }
}

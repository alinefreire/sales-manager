<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Services\CreateCustomerService;
use App\Services\CustomerService;
use Illuminate\Http\Request;


/**
 * Class CustomerController
 * @package App\Http\Controllers
 */
class CustomerController extends Controller
{
    /**
     * CustomerService instance.
     *
     * @return void
     */
    public function index(Request $request, CustomerService $service)
    {
        return $service->paginateByCriteria($request->get('name'));
    }

    /**
     * @param  string  $name
     * @param  CustomerService  $service
     * @return mixed
     */
    public function get(string $name, CustomerService $service)
    {
        return $service->findByName($name);
    }

    /**
     * @param  Request  $request
     * @param  CreateCustomerService  $service
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, CreateCustomerService $service)
    {
        $this->validate($request, StoreCustomerRequest::rules(), StoreCustomerRequest::messages());
        return $service->create($request->all());
    }

}

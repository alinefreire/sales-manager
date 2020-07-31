<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Services\CreateCustomerService;
use App\Services\CustomerService;
use App\Services\UpdateCustomerService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class CustomerController
 * @package App\Http\Controllers
 */
class CustomerController extends Controller
{
    /**
     * CustomerService instance.
     *
     * @param  Request  $request
     * @param  CustomerService  $service
     * @return void
     */
    public function index(Request $request, CustomerService $service)
    {
        $response = $service->paginateByCriteria($request->get('name'));
        return response()->json($response);
    }

    /**
     * @param  string  $id
     * @param  CustomerService  $service
     * @return mixed
     */
    public function show(string $id, CustomerService $service)
    {
        $response = $service->findById($id);

        return response()->json($response);
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
        $response = $service->create($request->all());
        return response()->json(["inserted_id" => $response->id], Response::HTTP_CREATED);
    }

    /**
     * @param  string  $id
     * @param  Request  $request
     * @param  UpdateCustomerService  $service
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(string $id, Request $request, UpdateCustomerService $service)
    {
        $this->validate($request, StoreCustomerRequest::rules(), StoreCustomerRequest::messages());
        $response = $service->update($id, $request->all());
        return response()->json($response, Response::HTTP_NO_CONTENT);
    }

    /**
     * @param  string  $id
     * @param  CustomerService  $service
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function remove(string $id, CustomerService $service)
    {
        $service->deleteById($id);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

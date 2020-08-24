<?php

namespace App\Http\Controllers;

use App\Contracts\CreateCustomerService;
use App\Contracts\CustomerService;
use App\Contracts\UpdateCustomerService;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;


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
     * @param  CustomerService  $customerService
     * @return void
     */
    public function index(Request $request, CustomerService $customerService)
    {
        $response = $customerService->paginateByCriteria($request->get('name'));
        return response()->json($response);
    }

    /**
     * @param  string  $id
     * @param  CustomerService  $customerService
     * @return mixed
     */
    public function show(string $id, CustomerService $customerService)
    {
        $response = $customerService->findById($id);
        return response()->json($response);
    }

    /**
     * @param  StoreCustomerRequest  $request
     * @param  CreateCustomerService  $createCustomerService
     * @return mixed
     */
    public function store(StoreCustomerRequest $request, CreateCustomerService $createCustomerService)
    {
        $response = $createCustomerService->create($request->all());
        return response()->json(["inserted_id" => $response->id], Response::HTTP_CREATED);
    }

    /**
     * @param  string  $id
     * @param  UpdateCustomerRequest  $request
     * @param  UpdateCustomerService  $updateCustomerService
     * @return JsonResponse
     */
    public function update(string $id, UpdateCustomerRequest $request, UpdateCustomerService $updateCustomerService)
    {
        $response = $updateCustomerService->update($id, $request->all());
        return response()->json($response, Response::HTTP_NO_CONTENT);
    }

    /**
     * @param  string  $id
     * @param  CustomerService  $customerService
     * @return JsonResponse
     * @throws Throwable
     */
    public function remove(string $id, CustomerService $customerService)
    {
        $customerService->deleteById($id);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Services\CreateProductService;
use App\Services\ProductService;
use App\Services\UpdateProductService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * ProductService instance.
     *
     * @param  Request  $request
     * @param  ProductService  $service
     * @return void
     */
    public function index(Request $request, ProductService $service)
    {
        $response = $service->paginateByCriteria($request->get('description'));
        return response()->json($response);
    }

    /**
     * @param  string  $id
     * @param  ProductService  $service
     * @return mixed
     */
    public function show(string $id, ProductService $service)
    {
        $response = $service->findById($id);

        return response()->json($response);
    }

    /**
     * @param  Request  $request
     * @param  CreateProductService  $service
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, CreateProductService $service)
    {
        $this->validate($request, StoreProductRequest::rules(), StoreProductRequest::messages());
        $response = $service->create($request->all());
        return response()->json(["inserted_id" => $response->id], Response::HTTP_CREATED);
    }

    /**
     * @param  string  $id
     * @param  Request  $request
     * @param  UpdateProductService  $service
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(string $id, Request $request, UpdateProductService $service)
    {
        $this->validate($request, StoreProductRequest::rules(), StoreProductRequest::messages());
        $response = $service->update($id, $request->all());
        return response()->json($response, Response::HTTP_NO_CONTENT);
    }

    /**
     * @param  string  $id
     * @param  ProductService  $service
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function remove(string $id, ProductService $service)
    {
        $service->deleteById($id);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

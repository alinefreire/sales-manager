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
     * @param  ProductService  $productService
     * @return JsonResponse
     */
    public function index(Request $request, ProductService $productService)
    {
        $response = $productService->paginateByCriteria($request->get('description'));
        return response()->json($response);
    }

    /**
     * @param  string  $id
     * @param  ProductService  $productService
     * @return JsonResponse
     */
    public function show(string $id, ProductService $productService)
    {
        $response = $productService->findById($id);
        return response()->json($response);
    }

    /**
     * @param  Request  $request
     * @param  CreateProductService  $createProductService
     * @return JsonResponse
     */
    public function store(Request $request, CreateProductService $createProductService)
    {
        $response = $createProductService->create($request->all());
        return response()->json(["inserted_id" => $response->id], Response::HTTP_CREATED);
    }

    /**
     * @param  string  $id
     * @param  StoreProductRequest  $request
     * @param  UpdateProductService  $updateProductService
     * @return JsonResponse
     */
    public function update(string $id, StoreProductRequest $request, UpdateProductService $updateProductService)
    {
        $response = $updateProductService->update($id, $request->all());
        return response()->json($response, Response::HTTP_NO_CONTENT);
    }

    /**
     * @param  string  $id
     * @param  ProductService  $productService
     * @return JsonResponse
     */
    public function remove(string $id, ProductService $productService)
    {
        $productService->deleteById($id);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

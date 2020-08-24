<?php

namespace App\Http\Controllers;


use App\Contracts\CreateSalesOrderService;
use App\Contracts\SalesOrderService;
use App\Contracts\UpdateSalesOrderService;
use App\Http\Requests\StoreSalesOrderRequest;
use App\Http\Requests\UpdateSalesOrderRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * Class SalesOrderController
 * @package App\Http\Controllers
 */
class SalesOrderController extends Controller
{
    /**
     * SalesOrderService instance.
     *
     * @param  Request  $request
     * @param  SalesOrderService  $orderService
     * @return JsonResponse
     */
    public function index(Request $request, SalesOrderService $orderService)
    {
        $response = $orderService->paginateByCriteria($request->get('name'));
        return response()->json($response);
    }

    /**
     * @param  string  $id
     * @param  SalesOrderService  $orderService
     * @return mixed
     */
    public function show(string $id, SalesOrderService $orderService)
    {
        $response = $orderService->findById($id);
        return response()->json($response);
    }

    /**
     * @param  StoreSalesOrderRequest  $request
     * @param  CreateSalesOrderService  $createSalesOrderService
     * @return JsonResponse
     */
    public function store(StoreSalesOrderRequest $request, CreateSalesOrderService $createSalesOrderService)
    {
        $response = $createSalesOrderService->create($request->all());
        return response()->json(["inserted_id" => $response->id], Response::HTTP_CREATED);
    }

    /**
     * @param  string  $id
     * @param  UpdateSalesOrderRequest  $request
     * @param  UpdateSalesOrderService  $updateSalesOrderService
     * @return JsonResponse
     */
    public function update(
        string $id,
        UpdateSalesOrderRequest $request,
        UpdateSalesOrderService $updateSalesOrderService
    ) {
        $response = $updateSalesOrderService->update($id, $request->all());
        return response()->json($response, Response::HTTP_NO_CONTENT);
    }

    /**
     * @param  string  $id
     * @param  SalesOrderService  $orderService
     * @return JsonResponse
     * @throws Throwable
     */
    public function remove(string $id, SalesOrderService $orderService)
    {
        $orderService->deleteById($id);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

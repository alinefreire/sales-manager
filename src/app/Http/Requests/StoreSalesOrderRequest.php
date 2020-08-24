<?php

namespace App\Http\Requests;


use Pearl\RequestValidate\RequestAbstract;

/**
 * Class StoreSalesOrderRequest
 *
 * @package App\Http\Requests
 */
class StoreSalesOrderRequest extends RequestAbstract
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'items' => 'required|unique:product,id',
            'customer' => 'required|unique:customers,id',
            'status' => 'required',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'items.required' => 'Os itens do pedido são obrigatórios.',
            'customer.required' => 'Obrigatório informar um cliente'
        ];
    }
}

<?php

namespace App\Http\Requests;


use Pearl\RequestValidate\RequestAbstract;

/**
 * Class UpdateSalesOrderRequest
 *
 * @package App\Http\Requests
 */
class UpdateCustomerRequest extends RequestAbstract
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'bail|exists:customers,id',
            'name' => 'unique:customers,name',
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
            'name.unique' => 'Já existe um Cliente com o nome informado',
            'id.exists' => 'SalesOrder não encontrado'
        ];
    }
}

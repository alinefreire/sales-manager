<?php

namespace App\Http\Requests;


use Pearl\RequestValidate\RequestAbstract;

/**
 * Class StoreSalesOrderRequest
 *
 * @package App\Http\Requests
 */
class StoreCustomerRequest extends RequestAbstract
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:customers,name'
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
            'name.required' => 'O Nome do Cliente é obrigatório.',
            'name.unique' => 'Já existe um Cliente com o nome informado'
        ];
    }
}

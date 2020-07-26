<?php

namespace App\Http\Requests;


/**
 * Class StoreCustomerRequest
 *
 * @package App\Http\Requests
 */
class StoreCustomerRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function rules()
    {
        return [
            'name' => 'required'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public static function messages()
    {
        return [
            'name.required'  => 'O Nome do Cliente é obrigatório.'
        ];
    }
}

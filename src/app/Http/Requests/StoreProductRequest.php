<?php

namespace App\Http\Requests;


/**
 * Class StoreProductRequest
 *
 * @package App\Http\Requests
 */
class StoreProductRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function rules()
    {
        return [
            'description' => 'required'
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
            'description.required'  => 'A descrição do produto é obrigatória.'
        ];
    }
}

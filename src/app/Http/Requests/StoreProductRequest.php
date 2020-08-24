<?php

namespace App\Http\Requests;


use Pearl\RequestValidate\RequestAbstract;

/**
 * Class StoreProductRequest
 *
 * @package App\Http\Requests
 */
class StoreProductRequest extends RequestAbstract
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
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
    public function messages(): array
    {
        return [
            'description.required' => 'A descrição do produto é obrigatória.'
        ];
    }
}

<?php

namespace App\Repositories\Transformers;

use App\Models\Customer;
use League\Fractal\TransformerAbstract;

/**
 * Class CustomerTransformer
 *
 * @package App\Repositories\Transformers
 */
class CustomerTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'address',
    ];

    /**
     * Transform the Customer entity
     *
     * @param  Customer  $model
     * @return array
     */
    public function transform(Customer $model)
    {
        return [
            'id' => $model->id,
            'nome' => $model->name,
            'email' => $model->email,
            'phone_number' => $model->phone_number,
            'address' => $model->address
        ];
    }

    /**
     * Include Address
     *
     * @param  Customer  $model
     * @return \League\Fractal\Resource\Item|null
     */
    public function includeAddress(Customer $model)
    {
        if (!$model->address) {
            return null;
        }

        return $this->item($model->address, new AddressTransformer());
    }
}

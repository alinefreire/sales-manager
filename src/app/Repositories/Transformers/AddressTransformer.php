<?php

namespace App\Repositories\Transformers;

use App\Models\Address;
use League\Fractal\TransformerAbstract;

/**
 * Class AddressTransformer
 * @package App\Repositories\Transformers
 */
class AddressTransformer extends TransformerAbstract
{

    /**
     * Transform the \Address entity
     * @param  \Address  $model
     *
     * @return array
     */
    public function transform(Address $model)
    {
        return [
            'street' => $model->street,
            'number' => $model->number,
            'neighborhood' => $model->neighborhood,
            'complement' => $model->complement,
            'postal_code' => $model->postal_code,
            'trashed' => $model->trashed(),
            'created' => $model->created_at->format('d/m/Y'),
            'updated' => $model->updated_at->format('d/m/Y'),
        ];
    }

}

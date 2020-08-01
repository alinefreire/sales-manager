<?php

namespace App\Repositories\Transformers;

use App\Models\Product;
use League\Fractal\TransformerAbstract;

/**
 * Class ProductTransformer
 *
 * @package App\Repositories\Transformers
 */
class ProductTransformer extends TransformerAbstract
{

    /**
     * Transform the Product entity
     *
     * @param  Product $model
     * @return array
     */
    public function transform(Product $model)
    {
        return [
            'id'          => $model->id,
            'description' => $model->description,
            'price'       => $model->price
        ];
    }
}

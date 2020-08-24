<?php

namespace App\Repositories\Transformers;

use Abvtex\Domains\Audits\Models\Result;
use App\Models\SalesOrder;
use League\Fractal\TransformerAbstract;

/**
 * Class SalesOrderTransformer
 *
 * @package App\Repositories\Transformers
 */
class SalesOrderTransformer extends TransformerAbstract
{

    /**
     * Transform the SalesOrder entity
     *
     * @param  SalesOrder  $model
     * @return array
     */
    public function transform(SalesOrder $model)
    {
        return [
            'id' => $model->id,
            'delivery_date' => $model->delivery_date,
            'current_status' => collect($model->current_status)->get('code'),
            'customer' => $model->customer,
            'items' => $model->items
        ];
    }

}

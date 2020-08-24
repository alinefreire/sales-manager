<?php

namespace App\Models;

use App\Models\Traits\SalesOrderRelationship;
use Jenssegers\Mongodb\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class SalesOrder.
 *
 * @package namespace App\Models;
 */
class SalesOrder extends Model implements Transformable
{
    use TransformableTrait;
    use SalesOrderRelationship;

    protected $table = 'sales_order';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "customer",
        "delivery_date",
        "current_status",
        "status_log",
        "items"
    ];

}

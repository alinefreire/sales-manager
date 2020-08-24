<?php

namespace App\Models\Traits;

use App\Models\Items;
use App\Models\SalesOrder;
use App\Models\Statuses;

trait SalesOrderRelationship
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|\Jenssegers\Mongodb\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(SalesOrder::class, 'customer');
    }

    public function products()
    {
        return $this->belongsToMany(Items::class, 'items');
    }
}

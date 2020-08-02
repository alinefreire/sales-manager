<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Customer.
 *
 * @package namespace App\Models;
 */
class Customer extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'observation'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|\Jenssegers\Mongodb\Relations\BelongsTo
     */
    public function addresses()
    {
        return $this->belongsTo(Address::class, 'address');
    }
}

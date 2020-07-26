<?php


namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'city',
        'state',
        'street',
        'number',
        'postal_code',
        'neighborhood',
        'complement'
    ];
}

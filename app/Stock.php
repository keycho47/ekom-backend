<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'product_id', 'client_id', 'user_id', 'entity_id','quantity','description'
    ];
}

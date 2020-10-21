<?php

namespace App;

use Carbon\Traits\Date;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'product_id', 'client_id', 'user_id', 'entity_id','quantity','description'
    ];
    protected $dateFormat = 'Y-m-d';

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function entity()
    {
        return $this->belongsTo('App\Entity');
    }
}

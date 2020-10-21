<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = [
        "client_id","product_id","tax_id","price_without_tax",
    ];
}

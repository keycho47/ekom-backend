<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name','address','tax_number','contact_person','registration_number','is_active','is_deleted',
    ];
}

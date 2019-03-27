<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bon extends Model
{
    protected $fillable = ['owner_id', 'bill_id', 'product_string'];
}

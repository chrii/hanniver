<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = ['owner_id', 'bon_id', 'completed'];
    protected $primaryKey = 'bill_id'; 
}

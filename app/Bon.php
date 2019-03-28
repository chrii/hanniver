<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bon extends Model
{
    protected $fillable = ['owner_id', 'bill_id', 'product_string'];
    protected $primaryKey = 'bon_id';

    public function convertJson(String $json) {
        dd($json);
        $json = collect(json_decode($json));

    }
}

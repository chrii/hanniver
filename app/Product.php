<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    protected  $primaryKey = 'product_id';


    public function category() {
        return $this->hasOne(
            Category::class, 
            'category_id', 
            'category_id'
        );
    }
}
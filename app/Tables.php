<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tables extends Model
{
    protected $fillable = ['users_on_table'];
    
    protected $primaryKey = 'table_id';

    public function userOnTable() {
        return $this->hasMany(
            User::class,
            'has_table'
        );
    }
}
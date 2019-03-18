<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tables extends Model
{
    protected $fillable = ['users_on_table', 'has_table', 'table_id'];
    
    protected $primaryKey = 'table_id';

    public function userOnTable() {
        return $this->hasMany(
            User::class,
            'has_table',
            $this->primaryKey
        );
    }
}
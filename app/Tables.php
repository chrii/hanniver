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

    public function allBills() {
        return $this->hasMany(
            Bill::class,
            'table_id'
        );
    }

    public function getBills() {
        return $this->hasManyThrough(
            Bon::class,
            Bill::class,
            'table_id',
            'bill_id',
            'table_id',
            'bill_id'
        );
    }
/*     public function getBonInformation() {
        $dummy = '{"1":2,"2":1}';
        $billInformation = $this->allBills();


    } */
}
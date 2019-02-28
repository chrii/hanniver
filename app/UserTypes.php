<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserTypes extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'group_id';

    public function userDataByType() {
        return $this->hasMany(
            User::class, 
            'group'
        );
    }
}

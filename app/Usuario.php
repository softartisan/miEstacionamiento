<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $guarded = [];
    
    public function user() {
        return $this->hasOne(User::class);
    }
}

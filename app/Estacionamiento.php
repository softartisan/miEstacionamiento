<?php

namespace App;

use App\Usuario;
use Illuminate\Database\Eloquent\Model;

class Estacionamiento extends Model
{
    protected $guarded = [];

    public function usuario() {
        return $this->belongsTo(Usuario::class);
    }
}

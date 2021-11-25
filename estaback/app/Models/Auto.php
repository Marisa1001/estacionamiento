<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{   //definir los datos de placa y marca y el cliente id
    use HasFactory;
    protected $fillable=[
        "placa",
        "marca",
        "cliente_id"
    ];
}

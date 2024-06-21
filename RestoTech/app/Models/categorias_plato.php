<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorias_plato extends Model
{
    protected $table = 'categorias_platos';
    public $timestamps = false;
    use HasFactory;
}

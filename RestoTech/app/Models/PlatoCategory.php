<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class platoCategory extends Model
{
    protected $table = 'plate_category';
    public $timestamps = false;
    use HasFactory;
}

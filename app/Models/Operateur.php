<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operateur extends Model
{
    use HasFactory;
    protected $table = 'operateur';
    public $primaryKey = 'id';
    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amelioration extends Model
{
    use HasFactory;
    protected $table = 'amelioration';
    public $primaryKey = 'id_amel';
    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureTypeSec extends Model
{
    protected $table = 'type_fact_seco';
    public $primaryKey = 'id';
    public $timestamps = false;
    use HasFactory;
}

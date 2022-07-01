<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureType extends Model
{
    protected $table = 'type_facture';
    public $primaryKey = 'id';
    public $timestamps = false;
    use HasFactory;
}

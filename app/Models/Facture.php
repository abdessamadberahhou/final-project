<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $table = 'facture_batiment';
    public $primaryKey = 'id';
    public $timestamps = false;
}

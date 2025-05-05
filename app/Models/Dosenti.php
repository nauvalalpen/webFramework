<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dosenti extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'dosentis'; // Make sure this matches your table name
    protected $fillable = ['nama', 'nik', 'email', 'nohp', 'bidang', 'alamat'];
}

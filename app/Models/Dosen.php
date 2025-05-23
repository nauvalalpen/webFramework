<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dosen extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['nama', 'nip', 'email', 'nohp', 'bidang_keahlian', 'alamat'];
}

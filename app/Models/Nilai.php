<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = ['nama', 'tugas', 'uts', 'uas', 'nilai_akhir', 'grade'];
}

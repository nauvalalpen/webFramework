<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
   //
    protected $fillable = ['title','author','stock','price'];
 
   public function publishingReports()
{
   return $this->hasMany(PublishingReport::class);
}


public function sales()
{
   return $this->hasMany(Sale::class);
}
}

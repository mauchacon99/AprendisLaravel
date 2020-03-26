<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    //
    //protected $table = 'my_profession';
   // $$timestamps = false;
   protected $fillable = ['title'];

   public function Profiles()
   {
       return $this->hasMany(UserProfile::class);
   }

  
}

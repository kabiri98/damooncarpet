<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $fillable = [
        'name', 'label'
    ];
   public function users(){
       return $this->belongsToMany(User::class);
   }
   public function permissions(){
       return $this->belongsToMany(Permission::class);
   }
}

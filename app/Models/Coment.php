<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Coment extends Model
{
     protected $guarded = ['id'];
     protected $with = ['software'];

     use Notifiable;
     
     public function children()
     {
     return $this->hasMany(Coment::class, 'coment_id', 'id');
     }

     public function software()
     {
     return $this->belongsTo(Software::class);
     }
}

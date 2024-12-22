<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Os extends Model
{
     use HasFactory;

    protected $guarded = ['id'];

    public function Software() 
    {
        return $this->hasMany(Software::class);
    }
}

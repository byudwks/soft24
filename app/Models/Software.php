<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\Sluggable;


use Illuminate\Database\Eloquent\Model;

class Software extends Model  implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

      protected $guarded = ['id'];
      protected $with = ['os'];

      public function scopeFilter($query, array $filters)
        {

            $query->when($filters['os'] ?? false, function($query, $os){
                return $query->whereHas('os' , function($query) use ($os){
                    $query->where('slug' , $os);
                });
            });

            $query->when($filters['search'] ?? false, function($query, $search) {
                return $query->where('name', 'like',  '%' . $search . '%');
            });

        }

      public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image');
        $this->addMediaCollection('icon');
    }

    public function comments()
    {
        return $this->hasMany(Coment::class);
    }

    public function os()
    {
        return $this->belongsTo(Os::class);
    }

    public function isPublished(): bool
    {
        return (bool) $this->published;
    }

    public function getRouteKeyName(){
        return 'slug';
   }

}
    
    
         
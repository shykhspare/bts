<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Spatie\MediaLibrary\HasMedia;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Cviebrock\EloquentSluggable\Sluggable;


class Category extends Model implements HasMedia
{
    use SoftDeletes;
    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    use Sluggable;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'enabled',

    ];


    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];


    //  Generate slug 

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {

        return url('/admin/categories/' . $this->getKey());
    }



    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('category')
            ->accepts('image/*')
            ->maxNumberOfFiles(20);
    }


    public function registerMediaConversions($media = null): void
    {
        $this->autoRegisterThumb200();
    }

    /* ************************ RELATIONSHIP ************************* */
    // With Books author has many books 
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}

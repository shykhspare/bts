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


class Author extends Model implements HasMedia
{
    use SoftDeletes;
    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    use Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'enabled',

    ];


    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',

    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    protected $appends = ['resource_url'];




    /* ************************ RelationShip ************************* */
    // With Books author has many books 
    public function books()
    {
        return $this->hasMany(Book::class);
    }




    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/authors/' . $this->getKey());
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('authors')
            ->accepts('image/*')
            ->maxNumberOfFiles(1);
    }

    public function registerMediaConversions($media = null): void
    {
        $this->autoRegisterThumb200();
        $this->addMediaConversion('thumbnail')
            ->width(140)
            ->height(140)
            ->performOnCollections('authors');
    }
}

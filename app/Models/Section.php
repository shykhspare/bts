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

class Section extends Model implements HasMedia
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
        'language',
        'enabled',
        'mcqs',
        'author_id',
        'category_id',
        'book_id',
        'hassection',
        'section_id'

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
        return url('/admin/sections/' . $this->getKey());
    }

    /* ************************ MEDIA ATTACHED ************************* */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('sections')
            ->accepts('image/*')
            ->maxNumberOfFiles(20);
    }


    public function registerMediaConversions($media = null): void
    {
        $this->autoRegisterThumb200();
        $this->addMediaConversion('120x180')
            ->width(120)
            ->height(180)
            ->performOnCollections('sections');
    }

    /* ************************ RELATIONSHIP ************************* */

    // with Book

    public function book()
    {
        return $this->belongsTo(Book::class);
    }


    public function Section()
    {
        return $this->belongsTo(Section::class);
    }

    public function Sections()
    {
        return $this->hasMany(Section::class, 'section_id');
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}

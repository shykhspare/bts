<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Spatie\MediaLibrary\HasMedia;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;



class Slide extends Model implements HasMedia
{

    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;

    protected $fillable = [
        'description',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/slides/' . $this->getKey());
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('slide')
            ->accepts('image/*')
            ->maxNumberOfFiles(1);
    }


    public function registerMediaConversions($media = null): void
    {
        $this->autoRegisterThumb200();
        $this->addMediaConversion('800x420')
            ->width(800)
            ->height(420)
            ->performOnCollections('slide');
    }
}

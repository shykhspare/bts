<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Spatie\MediaLibrary\HasMedia;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Cviebrock\EloquentSluggable\Sluggable;

class Setting extends Model implements HasMedia
{

    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;


    protected $fillable = [
        'name',
        'logo',
        'footerlogo',
        'address',
        'email',
        'phone',
        'facebook',
        'youtube',
        'instagram',
        'twitter',
        'pinterest',
        'footer',
        'copyright',
        'map',
        'currency_symbol',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/settings/' . $this->getKey());
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('settings')
            ->accepts('image/*')
            ->maxNumberOfFiles(1);
    }

    public function registerMediaConversions($media = null): void
    {
        $this->autoRegisterThumb200();
        $this->addMediaConversion('header')
            ->width(200)
            ->height(50)
            ->performOnCollections('settings');

        $this->addMediaConversion('footer')
            ->width(200)
            ->height(50)
            ->performOnCollections('settings');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Spatie\MediaLibrary\HasMedia;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;

class Question extends Model  implements HasMedia
{
    use SoftDeletes;
    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    use SoftDeletes;
    protected $fillable = [
        'description',
        'answer',
        'marks',
        'order',
        'type',
        'link',
        'unit_id',
        'paid',
        'explanation',
        'test_id',
        'belong_to',

    ];


    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/questions/' . $this->getKey());
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('question')
            ->accepts('image/*')
            ->maxNumberOfFiles(1);

        $this->addMediaCollection('answer_attachment')
            ->accepts('image/*')
            ->maxNumberOfFiles(1);
    }


    public function registerMediaConversions($media = null): void
    {
        $this->autoRegisterThumb200();
        $this->addMediaConversion('300x452')
            ->width(300)
            ->height(452)
            ->performOnCollections('question');
        $this->addMediaConversion('300x452')
            ->width(300)
            ->height(452)
            ->performOnCollections('answer_attachment');
    }

    /* ************************ RELATIONSHIP ************************* */
    // With Units 
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }


    // With Units 
    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function comments()
    {
        return  $this->hasMany(Comment::class, 'question_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Test extends Model
{
    use SoftDeletes;
    use Sluggable;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'language',
        'enabled',
        'price',
        'date',
        'announce_date',
        'last_date',

    ];


    protected $dates = [
        'date',
        'announce_date',
        'last_date',
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
        return url('/admin/tests/' . $this->getKey());
    }
}

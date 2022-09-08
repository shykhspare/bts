<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Unit extends Model
{
    use SoftDeletes;
    use Sluggable;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'enabled',
        'mcqs',
        'order',
        'section_id',

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
        return url('/admin/units/' . $this->getKey());
    }


    //  Generate slug 
    //  Generate slug 
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /* ************************ RELATIONSHIP ************************* */
    // With Sections 
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}

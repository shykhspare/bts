<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function book()
    {
        return $this->belongsTo(Book::class, 'model_id', 'id');
    }

    public function orderHd()
    {
        return $this->belongsTo(OrderHd::class, 'orderhd_id');
    }
}

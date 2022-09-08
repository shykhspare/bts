<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderHd extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'session_id',
        'status',
        'user_id',
        'name',
        'email',
        'phoneno',
        'address',
        'company',
        'amount',
        'orderNo',
        'expired_at',
        'city',
        'state',
        'zip',
        'note',
        'paid',
        'payment_method',
        'transaction_no',
        'transaction_attachment',
        'type',
        'model_id',
        'ship_amount',

    ];


    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
        'expired_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/order-hds/' . $this->getKey());
    }


    public function status()
    {
        if ($this->status == 1) {
            return 'New';
        }

        if ($this->status == 2) {
            return 'Complete';
        }
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'orderhd_id');
    }

    public function paymentMethod()
    {
        if ($this->payment_method == 'bacs') {
            return 'Direct bank transfer';
        }
        if ($this->payment_method == 'cod') {
            return 'Cash on delivery';
        }
        if ($this->payment_method == null || $this->payment_method == '') {
            return 'No payment details';
        }
    }
}

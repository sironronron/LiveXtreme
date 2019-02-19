<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id', 'billing_tax', 'billing_name', 'billing_city', 'billing_total', 'billing_total', 'billing_phone', 'billing_email', 'billing_address', 'billing_province', 'billing_subtotal',
        'billing_discount', 'billing_postalcode', 'billing_name_on_cart', 'billing_discount_code'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('quantity');
    }
}

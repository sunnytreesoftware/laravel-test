<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesHistory extends Model
{
    const ORDER = 0;
    const PAID = 1;

    protected $appends = ['total_price'];
    protected $fillable = [
        'product_id',
        'customer_id',
        'sales_man_id',
        'quantity',
        'price',
        'order_status'
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function customer(){
        return $this->belongsTo(User::class, 'sales_man_id');
    }

    public function getTotalPriceAttribute(){
        return number_format($this->price * $this->quantity);
    }
}

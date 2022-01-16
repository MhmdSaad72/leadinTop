<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_stock')
                    ->withPivot( 'quantity')
                    ->withTimestamps();
    }

    public function quantity() {
        $quantities = ProductStock::where('stock_id', $this->id)->sum('quantity');
        return $quantities;
    }
}

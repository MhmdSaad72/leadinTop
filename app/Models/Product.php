<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function stocks()
    {
        return $this->belongsToMany(Stock::class, 'product_stock')
                    ->withPivot( 'quantity')
                    ->withTimestamps();
    }

    public function quantity() {
        $quantities = ProductStock::where('product_id', $this->id)->sum('quantity');
        return $quantities;
    }
}

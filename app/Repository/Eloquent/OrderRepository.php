<?php   

namespace App\Repository\Eloquent;   

use App\Repository\OrderRepositoryInterface; 
use App\Models\ProductStock;
use App\Models\Product;
use App\Models\Stock;

class OrderRepository implements OrderRepositoryInterface 
{    
    public function products()
    {
        return Product::all();
    }
    public function stocks()
    {
        return Stock::all();
    }
    public function income(array $attributes)
    {
        return ProductStock::create($attributes);
    }
    public function outcome(array $attributes)
    {
        // return Stock::findOrFail($id);
    }
}
<?php

namespace App\Services;

use Closure;
use App\Models\ProductStock;


class Quantity {

    public function handle($request, Closure $next)
    {
        $query = ProductStock::where('product_id', $request['product_id'])
                                     ->where('stock_id', $request['stock_id']);

        $existQuantity = $query->sum('quantity');
        $items = $query->get();

        if ($request['quantity'] <= $existQuantity) {
            foreach ($items as $key => $value) {
              $count -= (int) $value->quantity;
              if ($count >= 0) {
                $value->update(['quantity' => 0]);
              }else {
                $value->update(['quantity' => abs($count)]);
              }
            }
            return "true";
        }
        return $existQuantity;
    }
}
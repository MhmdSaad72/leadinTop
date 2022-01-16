<?php   

namespace App\Repository\Eloquent;   

use App\Repository\EloquentRepositoryInterface; 
use App\Models\Product;

class ProductRepository extends EloquentRepository implements EloquentRepositoryInterface 
{    
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }
}
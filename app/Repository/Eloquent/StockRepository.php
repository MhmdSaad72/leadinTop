<?php   

namespace App\Repository\Eloquent;   

use App\Repository\EloquentRepositoryInterface; 
use App\Models\Stock;

class StockRepository extends EloquentRepository implements  EloquentRepositoryInterface
{    
    public function __construct(Stock $model)
    {
        parent::__construct($model);
    }
}
<?php   

namespace App\Repository\Eloquent;   

use App\Repository\EloquentRepositoryInterface; 
use Illuminate\Database\Eloquent\Model;

class EloquentRepository 
{    
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function all()
    {
        return $this->model->all();
    }
    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }
    public function create(array $attributes){
        return $this->model->create($attributes);
    }
    public function update($id, array $attributes){
        return $this->model->whereId($id)->update($attributes);
    }
    public function delete($id){
        $this->model->destroy($id);
    }

    public function quantity($id)
    {
        # code...
    }
}
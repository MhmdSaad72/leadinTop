<?php 

namespace App\Repository;

/**
* Interface StockRepositoryInterface
* @package App\Repositories
*/
interface EloquentRepositoryInterface
{
    public function all();
    public function findById($id);
    public function create(array $attributes);
    public function update($id, array $attributes);
    public function delete($id);
    public function quantity($id);
}
?>
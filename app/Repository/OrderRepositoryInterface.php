<?php 

namespace App\Repository;

/**
* Interface OrderRepositoryInterface
* @package App\Repositories
*/
interface OrderRepositoryInterface
{
    public function products();
    public function stocks();
    public function income(array $attributes);
    public function outcome(array $attributes);
}
?>
<?php

namespace App\Http\Controllers;

use App\Repository\OrderRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
   {
       $this->orderRepository = $orderRepository;
   }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dashboard = $page = 'Dashboard';
        $stocks = $this->orderRepository->stocks();
        $products = $this->orderRepository->products();
        return view('admin.index', compact('dashboard', 'page', 'stocks', 'products'));
    }
}

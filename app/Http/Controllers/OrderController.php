<?php

namespace App\Http\Controllers;

use App\Repository\OrderRepositoryInterface;
use App\Http\Requests\OutcomeRequest;
use App\Http\Requests\IncomeRequest;
use Illuminate\Pipeline\Pipeline;
use App\Models\Stock;

class OrderController extends Controller
{

    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
   {
       $this->orderRepository = $orderRepository;
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function incomePage()
    {
        $products = $this->orderRepository->products();
        $stocks = $this->orderRepository->stocks();
        $incomePage = $page = 'Get Order';
        return view('admin.order.income', compact('incomePage', 'page', 'products', 'stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function income(IncomeRequest $request)
    {
        $requestData = $request->all();
        $this->orderRepository->income($requestData);
        return redirect()->back()->with('flash_message', 'Quantity increased!');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function outcomePage()
    {
        $outcomePage = $page = 'Make Order';
        $products = $this->orderRepository->products();
        $stocks = $this->orderRepository->stocks();
        return view('admin.order.outcome', compact('outcomePage', 'page', 'products', 'stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function outcome(OutcomeRequest $request)
    {
        $requestData = $request->all();
        $pipeline = app(Pipeline::class)
                    ->send($requestData)
                    ->through([ \App\Services\Quantity::class])
                    ->thenReturn();

        if ($pipeline !== "true") {
            return redirect()->back()->with('error', "Can not accept quantity more than {$pipeline}");
        }
        $this->orderRepository->outcome($requestData);
        return redirect()->back()->with('flash_message', 'Quantity decreased!');
    }
}

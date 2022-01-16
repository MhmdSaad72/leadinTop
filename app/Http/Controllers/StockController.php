<?php

namespace App\Http\Controllers;

use App\Repository\EloquentRepositoryInterface;
use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;
use App\Models\Stock;

class StockController extends Controller
{

    private $stockRepository;

    public function __construct(EloquentRepositoryInterface $stockRepository)
   {
       $this->stockRepository = $stockRepository;
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stockPage = $page = 'Stocks';
        $stocks = $this->stockRepository->all();
        return view('admin.stock.index', compact('stocks', 'stockPage', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stockPage = $page = 'Create New Stock';
        return view('admin.stock.create', compact('stockPage', 'page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStockRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStockRequest $request)
    {
        $requestData = $request->all();

        $this->stockRepository->create($requestData);
        return redirect()->route('stocks.index')->with('flash_message', 'Stock added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stockPage = $page = 'Edit Stock';
        $stock =  $this->stockRepository->findById($id);
        return view('admin.stock.edit', compact('stockPage', 'page', 'stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStockRequest  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStockRequest $request, $id)
    {
        $requestData = request()->except(['_token', '_method']);;
                
        $this->stockRepository->findById($id);
        $this->stockRepository->update($id, $requestData);
        return redirect()->route('stocks.index')->with('flash_message', 'Stock updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->stockRepository->delete($id);
        return redirect()->route('stocks.index')->with('flash_message', 'Stock deleted!');
    }
}

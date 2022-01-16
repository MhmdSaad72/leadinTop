<?php

namespace App\Http\Controllers;

use App\Repository\EloquentRepositoryInterface;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Pipeline\Pipeline;
use App\Models\Product;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(EloquentRepositoryInterface $productRepository)
   {
       $this->productRepository = $productRepository;
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodPage = $page = 'Products';
        $products = $this->productRepository->all();
        return view('admin.product.index', compact('products', 'prodPage', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodPage = $page = 'Create New Product';
        return view('admin.product.create', compact('prodPage', 'page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $requestData = $request->all();
        $pipeline = app(Pipeline::class)
                    ->send($requestData)
                    ->through([ \App\Services\Image::class])
                    ->thenReturn();

        $this->productRepository->create($requestData);
        return redirect()->route('products.index')->with('flash_message', 'Product added!');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prodPage = $page = 'Edit product';
        $product =  $this->productRepository->findById($id);
        return view('admin.product.edit', compact('prodPage', 'page', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $requestData = request()->except(['_token', '_method']);
        $pipeline = app(Pipeline::class)
                    ->send($requestData)
                    ->through([ \App\Services\Image::class])
                    ->thenReturn();
                
        $this->productRepository->findById($id);
        $this->productRepository->update($id, $requestData);
        return redirect()->route('products.index')->with('flash_message', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productRepository->delete($id);
        return redirect()->route('products.index')->with('flash_message', 'Product deleted!');
    }
}

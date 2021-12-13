<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $products = Product::select('products.model', 'products.price', 'brands.name as brand'
        //                             , 'genders.name as gender', 'sizes.size', 'categories.name as category')
        //                     ->join('brands', 'brands.id', '=', 'products.brand_id')
        //                     ->join('genders', 'genders.id', '=', 'products.gender_id')
        //                     ->join('categories', 'categories.id', '=', 'products.category_id')
        //                     ->join('product_size', 'product_size.product_id', '=', 'products.id')
        //                     ->join('sizes', 'sizes.id', '=', 'product_size.size_id')
        //                     ->get();

        $products = Image::select('images.link', 'products.model', 'products.price', 'brands.name as brand',
                                    'genders.name as gender', 'sizes.size', 'categories.name as category')
                                    ->join('products', 'products.id', '=', 'images.product_id')
                                    ->join('brands', 'brands.id', '=', 'products.brand_id')
                                    ->join('genders', 'genders.id', '=', 'products.gender_id')
                                    ->join('categories', 'categories.id', '=', 'products.category_id')
                                    ->join('product_size', 'product_size.product_id', '=', 'products.id')
                                    ->join('sizes', 'sizes.id', '=', 'product_size.size_id')
                                    ->get();

        return response()->json(['products' => $products], 200);

    }

    public function getSingleProduct($id) {
        $product = Product::find($id);
        return response()->json(['product' => $product], 200);
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}

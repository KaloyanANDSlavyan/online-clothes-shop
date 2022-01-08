<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductSize;
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

    }

    public function getSingleProduct($id) {
        $product = Product::select('products.id', 'products.header_image_link as header', 'products.model', 'products.price', 'brands.name as brand',
                            'genders.name as gender', 'sizes.size', 'categories.name as category')
                            ->join('brands', 'brands.id', '=', 'products.brand_id')
                            ->join('genders', 'genders.id', '=', 'products.gender_id')
                            ->join('categories', 'categories.id', '=', 'products.category_id')
                            ->join('product_size', 'product_size.product_id', '=', 'products.id')
                            ->join('sizes', 'sizes.id', '=', 'product_size.size_id')
                            ->where('products.id', '=', $id)
                            ->get();
        
       return response()->json(['product' => $product], 200);
    }

    public function getProductsByGender($id) {
        $products = Product::select('products.id', 'products.header_image_link as header', 'products.model', 'products.price', 'brands.name as brand',
                            'genders.name as gender', 'categories.name as category')
                            ->join('brands', 'brands.id', '=', 'products.brand_id')
                            ->join('genders', 'genders.id', '=', 'products.gender_id')
                            ->join('categories', 'categories.id', '=', 'products.category_id')
                            ->where('genders.id', '=', $id)
                            ->get();

       return response()->json(['products' => $products], 200);
    }

    public function getMostRecent() {
        $products = Product::select('products.id', 'brands.name as brand', 'products.model',
                                        'products.header_image_link as header', 'products.price', 
                                        DB::raw('MAX(products.created_at) as most_recent'))
                            ->join('brands', 'brands.id', '=', 'products.brand_id')          
                            ->groupBy('products.id', 'brands.name', 'products.model',
                                        'products.header_image_link')
                            ->orderBy('most_recent', 'DESC')
                            ->limit(3)
                            ->get();

        return response()->json(['products' => $products], 200);
    }

    public function getProductsByGenderCategory($genderId, $categoryId) {
        $products = Product::select('products.id', 'products.header_image_link as header', 'products.model', 'products.price', 'brands.name as brand',
                            'genders.name as gender', 'categories.name as category')
                            ->join('brands', 'brands.id', '=', 'products.brand_id')
                            ->join('genders', 'genders.id', '=', 'products.gender_id')
                            ->join('categories', 'categories.id', '=', 'products.category_id')
                            ->where('genders.id', '=', $genderId, 'and')
                            ->where('categories.id', '=', $categoryId)
                            ->get();
                            
       return response()->json(['products' => $products], 200);
            
    }

    public function getProductsByGenderBrand($genderId, $brandId) {
        $products = Product::select('products.id', 'products.header_image_link as header', 'products.model', 'products.price', 'brands.name as brand',
                            'genders.name as gender', 'categories.name as category')
                            ->join('brands', 'brands.id', '=', 'products.brand_id')
                            ->join('genders', 'genders.id', '=', 'products.gender_id')
                            ->join('categories', 'categories.id', '=', 'products.category_id')
                            ->where('genders.id', '=', $genderId, 'and')
                            ->where('brands.id', '=', $brandId)
                            ->get();
                            
       return response()->json(['products' => $products], 200);
            
    }

    public function getProductsByGenderSize($genderId, $sizeId) {
        $products = ProductSize::select('products.id', 'products.header_image_link as header', 'products.model', 'products.price', 'brands.name as brand',
        'genders.name as gender', 'sizes.size', 'categories.name as category')
        ->join('products', 'products.id', '=', 'product_size.product_id')
        ->join('brands', 'brands.id', '=', 'products.brand_id')
        ->join('genders', 'genders.id', '=', 'products.gender_id')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->join('sizes', 'sizes.id', '=', 'product_size.size_id')
        ->where('genders.id', '=', $genderId, 'and')
        ->where('sizes.id', '=', $sizeId)
        ->get();

       return response()->json(['products' => $products], 200);
    }

    public function getImagesOfProduct($productId) {
        $images = Image::where('product_id', $productId)->get();

        return response()->json(['images' => $images], 200);
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

<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function show() {
        $brands = Brand::all('id', 'name');

       return response()->json(['brands' => $brands], 200);

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show() {
        $categories = Category::all('id', 'name');

        return response()->json(['categories' => $categories], 200);
    }
}

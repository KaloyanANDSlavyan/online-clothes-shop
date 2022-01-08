<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizesController extends Controller
{
    public function show() {
        $sizes = Size::all('id', 'size');

        return response()->json(['sizes' => $sizes], 200);

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::get();
        return view('list', compact('data'));
    }

    public function add()
    {
        return view('add')
    }
}

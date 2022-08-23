<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController2 extends Controller
{
    public function index()
    {
        return view('0905b.home');
    }

    public function getProducts()
    {
        $data = Product::get();
        return view('0905b.specials', compact('data'));
    }
    public function getAbout()
    {
        return view('0905b.about');
    }
}

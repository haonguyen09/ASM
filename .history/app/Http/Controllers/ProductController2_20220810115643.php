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
        return view('0905b.cars', compact('data'));
    }
    public function getAbout()
    {
        return view('0905b.about');
    }
    public function getContact()
    {
        return view('0905b.contact');
    }
    public function details($id)
    {
        $data = Product::select('products.*' 'producers.producerName')
        ->join('producers', 'producers.producerID', '=', 'products.producerID')
        ->where('products.productID','=', $id)
        ->first()
        return view('0905b.details', compact('data'));
    }
}

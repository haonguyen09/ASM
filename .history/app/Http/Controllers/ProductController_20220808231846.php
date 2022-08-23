<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //Class Request này nằm trong Illuminate\Http\Request core của Laravel.
use App\Models\Product;

class ProductController extends Controller
{
    public function index() // luôn luôn để public mới nhìn thấy đc
    {// Product: tên class, :: phương thức static
        $data = Product::get(); // truyền dữ liệu từ controller là Product ra view thông qua hàm compact, hàm này có thể gửi đc nhiều biến
        return view('list', compact('data')); // lấy dữ liệu của data và trả kết quả về view/list
    }

    public function add()
    {
        return view('add');
    }

    public function save(Request $request)// sử dụng Request của laravel để lấy các thông tin như input, cookies, file
    {
        $product = new Product(); // create an object
        $product->productID = $request->id; // gán thông tin của đối tượng mới vào database
        $product->productName = $request->name;
        $product->productPrice = $request->price;
        $product->productDetails = $request->details;
        $product->productImage1 = $request->image1;
        $product->producerID = $request->producer;
        $product->save();
        // hàm redirect dùng để chuyến hướng
        return redirect()->back()->with('success', 'Product Added Successfully'); // hàm with("key", value ) cũng sử dụng để truyền data như compact nhưng chỉ truyền đc 1 tham số khác với compact 
    }

    public function edit($id) 
    {
        $data = Product::where('productID', '=', $id)->first(); // first: gọi ra bản ghi đầu tiên, có nghĩa là chúng ta sẽ lấy ra productID đầu tiên mà admin muốn edit
        return view('edit', compact('data'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        Product::where('productID', '=', $id)->update([ // gọi hàm update
            'productName'=>$request->name,
            'productPrice'=>$request->price,
            'productDetails'=>$request->details,
            'productImage1'=>$request->image1,
            'producerID'=>$request->producer
        ]);
        return redirect()->back()->with('success', 'Product Updated Successfully');
    }

    public function delete($id)
    {
        Product::where('productID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Product Deleted Successfully');
    }
}

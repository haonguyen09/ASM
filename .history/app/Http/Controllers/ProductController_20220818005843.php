<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //Class Request này nằm trong Illuminate\Http\Request core của Laravel.
use App\Models\Product;
use App\Models\Producer;

/**
 * Model trong mô mình MVC dùng để tương tác với cơ sở dữ liệu và trả kết quả về cho Controller, 
 * từ đó controller sẽ xử lý kết quả đó và chuyển sang View để hiển thị lên website
 */
class ProductController extends Controller
{
    public function index() // luôn luôn để public mới nhìn thấy đc
    {// Product: tên class, :: phương thức static
        $data = Product::get(); // truyền dữ liệu từ controller là Product ra view thông qua hàm compact, hàm này có thể gửi đc nhiều biến
        return view('list', compact('data')); // lấy dữ liệu của data và trả kết quả về view/list
    }

    public function index2() // luôn luôn để public mới nhìn thấy đc
    {// Product: tên class, :: phương thức static
       /*
        $data2 = Product::select('products.*', 'producer.producerName')
        ->join('producers', 'producers.producerID', '=', 'products.producerID')->get(); // or first()
        return view('list2', compact('data2')); // lấy dữ liệu của data và trả kết quả về view/list*/
        $data2 = Producer::get(); // truyền dữ liệu từ controller là Product ra view thông qua hàm compact, hàm này có thể gửi đc nhiều biến
        return view('list2', compact('data2'));
    }

    public function add()
    {
        $producers = Producer::get();
        return view('add', compact('producers'));
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
        // return view('edit', compact('data'));
        $producers = Producer::get();
        return view('edit', compact('data','producers'));
    }

    public function edit2($id) 
    {
        $data2 = Product::where('productID', '=', $id)->first(); // first: gọi ra bản ghi đầu tiên, có nghĩa là chúng ta sẽ lấy ra productID đầu tiên mà admin muốn edit
        // return view('edit', compact('data'));
        $producers = Producer::get();
        return view('edit2', compact('data2','producers'));
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

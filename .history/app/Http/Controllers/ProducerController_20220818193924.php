<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producer;


class ProducerController extends Controller
{
    public function index2() // luôn luôn để public mới nhìn thấy đc
    {// Product: tên class, :: phương thức static
       /*
        $data2 = Product::select('products.*', 'producer.producerName')
        ->join('producers', 'producers.producerID', '=', 'products.producerID')->get(); // or first()
        return view('list2', compact('data2')); // lấy dữ liệu của data và trả kết quả về view/list*/
        $data2 = Producer::get(); // truyền dữ liệu từ controller là Product ra view thông qua hàm compact, hàm này có thể gửi đc nhiều biến
        return view('list2', compact('data2'));
    }

    public function add2()
    {
        $producers = Producer::get();
        return view('add2', compact('producers'));
    }

    public function save2(Request $request2)
    {
        $producer = new Producer(); // create an object
        $producer->producerID = $request->id; // gán thông tin của đối tượng mới vào database
        $producer->producerName = $request->name;
        $producer->producerDetails = $request->details;
        $producer->producerCountry = $request->country;
        $producer->save();
        // hàm redirect dùng để chuyến hướng
        return redirect()->back()->with('success', 'Producer Added Successfully');
    }


    public function edit2($id) 
    {
        $data2 = Product::where('productID', '=', $id)->first(); // first: gọi ra bản ghi đầu tiên, có nghĩa là chúng ta sẽ lấy ra productID đầu tiên mà admin muốn edit
        $producers = Producer::get();
        return view('edit2', compact('data2','producers'));
    }

    public function update2(Request $request)
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
    

    public function delete2($id)
    {
        Producer::where('producerID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Producer Deleted Successfully');
    }
}

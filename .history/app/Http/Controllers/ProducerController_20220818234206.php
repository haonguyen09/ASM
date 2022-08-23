<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producer;
use App\Models\Product;


class ProducerController extends Controller
{
    public function index2() 
    {
        $data2 = Producer::get(); // truyền dữ liệu từ controller là Product ra view thông qua hàm compact, hàm này có thể gửi đc nhiều biến
        return view('list2', compact('data2')); // lấy dữ liệu của data và trả kết quả về view/list
    }

    public function add2()
    {
        $producers = Producer::get();
        return view('add2', compact('producers'));
    }

    public function save2(Request $request)
    {
        $producer = new Producer(); // create an object
        // $producer->producerID = $request->id; // gán thông tin của đối tượng mới vào database
        $producer->producerName = $request->name;
        $producer->producerDetails = $request->details;
        $producer->producerCountry = $request->country;
        $product->producerName = $request->producer;
        $producer->save();
        // hàm redirect dùng để chuyến hướng
        return redirect('list2')->back()->with('success', 'Producer Added Successfully');
    }


    public function edit2($id) 
    {
        $data2 = Producer::where('producerID', '=', $id)->first(); // first: gọi ra bản ghi đầu tiên, có nghĩa là chúng ta sẽ lấy ra productID đầu tiên mà admin muốn edit
        $producers = Producer::get();
        return view('edit2', compact('data2','producers'));
    }

    public function update2(Request $request)
    {
        $id = $request->id;
        Producer::where('producerID', '=', $id)->update([ // gọi hàm update
            'producerName'=>$request->name,
            'producerDetails'=>$request->details,
            'producerCountry'=>$request->country
        ]);
        return redirect()->back()->with('success', 'Producer Updated Successfully');
    }
    

    public function delete2($id)
    {
        Producer::where('producerID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Producer Deleted Successfully');
    }
}

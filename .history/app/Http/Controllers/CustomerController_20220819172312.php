<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Admin;
use Hash;
use Session;

class CustomerController extends Controller
{
    public function register()
    {
        return view('0905b.register');
    }

    public function login()
    {
        return view('0905b.login');
    }

    public function registerProcess(Request $request)
    {
        $customer = new Customer();
        $customer->customerID = $request->username;
        $customer->customerPass = Hash::make($request->password);
        $customer->customerFullname = $request->fullname;
        $customer->customerEmail = $request->email;
        $customer->customerPhone = $request->phone;
        $res = $customer->save();
        if($res) {
            return back()->with('success', 'You have registered successfully!');
        } else {
            return back()->with('fail', 'Oh No! Something went wrong!!!');
        }
    }
    

    public function loginProcess(Request $request)
    {
        $customer = Customer::where('customerID', '=', $request->username)->first();
        if($customer) {
            if(Hash::check($request->password, $customer->customerPass)) {
                $request->session()->put('loginID', $customer->customerID);
                return redirect('dashboard');
            }
             else {
                return back()->with('fail', 'Password does not matches!!!');
            } 
            
        } else {
            return back()->with('fail', 'This account does not registered!!!');
        }

    }

    public function logout()
    {
        if(Session::has('loginID')) {
            Session::pull('loginID');
            return redirect('login');
        }
    }

    public function dashboard()
    {
        $customer = Customer::get();
        return view('dashboard', compact('customer'));
    }

    public function customerAccount()
    {

    }

    public function edit($id) 
    {
        $data = Product::where('productID', '=', $id)->first(); // first: gọi ra bản ghi đầu tiên, có nghĩa là chúng ta sẽ lấy ra productID đầu tiên mà admin muốn edit
        $producers = Producer::get();
        return view('edit', compact('data','producers'));
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
}

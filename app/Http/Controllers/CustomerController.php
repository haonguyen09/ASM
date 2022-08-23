<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Admin;
use Hash; // mã hóa password
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

    public function registerProcess(Request $request) // request để lấy dữ liệu trên form 
    {
        // $request->validate([
        //     'name' => 'required',
        //     'password' => 'required|min:5|max:12',
        //     'username' => 'required', 
        //     'email' => 'required|email|unique:customerd',
        //     'phone' => 'required',
        // ]);
        $customer = new Customer();
        $customer->customerID = $request->id; // $customer trỏ tới dữ liệu trong database, và $request có nhiệm vụ trỏ tới username bên form
        $customer->customerPass = Hash::make($request->password); // sử dụng Hash function đã use ở trên để mã hóa password
        $customer->customerFullName = $request->username;
        $customer->customerEmail = $request->email;
        $customer->customerPhone = $request->phone;
        $res = $customer->save();
        if($res) {
            return back()->with('success', 'You have registered successfully!'); // success và fail này sẽ dùng để kiểm tra session
        } else {
            return back()->with('fail', 'Oh No! Something went wrong!!!');
        }
    }
    

    public function loginProcess(Request $request)
    {
        $customer = Customer::where('customerFullName', '=', $request->username)->first(); // tìm kiếm customerID = username bên login page k và lấy phần tử đầu tiên
        if($customer) { 
            if(Hash::check($request->password, $customer->customerPass)) { // dùng hàm Hass::check để kiểm tra password có trùng hay không
                $request->session()->put('loginID', $customer->customerID); //dùng phương thức put để lưu giá trị mới vào session
                return redirect('/');
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
        if(Session::has('loginID')) {//Phương thức has cho phép bạn kiểm tra sự tồn tại của một session. Phương thức này sẽ trả về true nếu session đấy tồn tại:
            Session::pull('loginID'); //Dùng phương thức pull dùng để lấy và xóa ngay session này đi
            return redirect('login');
        }
    }


    public function information($id)
    {
        $data = Customer::where('customerID','=',$id)->first();
        return view('0905b.information',compact('data'));
    }

    public function saveinformation(Request $request)
    {
        $id = $request->id;
        Customer::where('customerID', '=', $id)->update([ // gọi hàm update
            'customerPass'=>$request->password,
            'customerFullName'=>$request->username,
            'customerEmail'=>$request->email,
            'customerPhone'=>$request->phone
        ]);
        return redirect()->back()->with('success', 'Customer Updated Successfully');
    }


    public function deleteCustomer($id)
    {
        Customer::where('customerID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Customer Deleted Successfully');
    }
}

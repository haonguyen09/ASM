<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Session;


class AdminController extends Controller
{
    public function login() {
        return view("admin.loginAdmin");
    }

    public function customerAccount() {
        $customers= Customer::get(); 
        return view('admin.customerAccount', compact('customers'));
    }

    public function adminAccount() {
        $admins= Admin::get(); 
        return view('admin.adminAccount', compact('admins'));
    }

    


    // function admins


    public function addAdmin()
    {
        $admins = Admin::get();
        return view('admin.addAdmin', compact('admins'));
    }

    public function saveAdmin(Request $request)// sử dụng Request của laravel để lấy các thông tin như input, cookies, file
    {
        $admins = new Admin(); // create an object
        $admins->adminID = $request->id; // gán thông tin của đối tượng mới vào database
        $admins->adminName = $request->name;
        $admins->adminPass = Hash::make($request->pass);
        $admins->adminUser = $request->user;
        $admins->adminPhone = $request->phone;
        $admins->adminImage = $request->image;
        $admins->save();
        // hàm redirect dùng để chuyến hướng
        return redirect()->back()->with('success', 'Admin Added Successfully'); // hàm with("key", value ) cũng sử dụng để truyền data như compact nhưng chỉ truyền đc 1 tham số khác với compact 
    }

    public function editAdmin($id) 
    {
        $admins = Admin::where('adminID', '=', $id)->first();
        
        // return view('edit', compact('data'));
        return view('admin.editAdmin', compact('admins'));
    }

    public function updateAdmin(Request $request)
    {
        $id = $request->id;
        Admin::where('adminID', '=', $id)->update([ // gọi hàm update
            'adminName'=>$request->name,
            'adminPass'=>$request->pass,
            'adminUser'=>$request->user,
            'adminPhone'=>$request->phone
        ]);
        return redirect()->back()->with('success', 'Admin Updated Successfully');
    }

    public function deleteAdmin($id)
    {
        Admin::where('adminID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Admin Deleted Successfully');
    }



    public function loginAdminProcess(Request $request)
    {      
        
            $admins = Admin::where('adminUser', '=', $request->user)->first();
            if($admins) {
                if(Hash::check($request->pass, $admins->adminPass)) {
                    $request->session()->put('loginadminID', $admins->adminID);
                    $request->session()->put('loginadminName', $admins->adminName);
                    $request->session()->put('loginadminImage', $admins->adminImage);
                    return  redirect('dashboard');
                } else {
                    return back()->with('fail', 'Password not matches!!!');
                }
                // return redirect('dashboard');
            }
            else {
                return back()->with('fail', 'This account does not added!!!');
            }
            
    }

    public function logoutAdmin()
    {
        if(Session()->has('loginadminImage') && session()->has('loginadminName')) {
            Session()->pull('loginadminImage');
            Session()->pull('loginadminName');
            return redirect('loginAdmin');
        }
    }


    public function dashboard() {
        
       if(Session()->has('loginadminImage') && session()->has('loginadminName')) {
           return view('admin.dashboard');
       } 
       else {
        return redirect('loginAdmin');
       }
      
    }
      


}
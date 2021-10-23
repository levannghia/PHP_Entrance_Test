<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function register(Request $request)
    {
        $request->validate([
                'name' => 'required',
                'phone' => 'required|numeric',
            ],
            [
                'name.required' => '* Vui lòng nhập họ tên',
                'phone.required' => '* Vui lòng nhập số điện thoại',
                'phone.numeric' => '* Trường điện thoại chỉ được nhập số',
        ]);

        $user = new User();
        if(strpbrk($request->email,'@') == '@kyanon.digital' || $request->email == ''){
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->old = $request->old;
            $user->description = $request->description;
            $user->save();
            return back()->with('success','Đăng ký thành công!');
        }
        else{
            return back()->with('faild','Email phải thuộc @kyanon.digital');
        }
        
    }
}

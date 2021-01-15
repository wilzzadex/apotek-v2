<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('role','!=','superadmin')->orderBy('created_at','ASC')->get();
        $data['user'] = $user;
        return view('backend.pages.user.user',$data);
    }

    public function add()
    {
        return view('backend.pages.user.user_add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'unique:users,email',
            'username' => 'unique:users,username',
        ]);

        $user = new User();
        $user->name = $request->nama;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect(route('back.user'))->with('success','Data User berhasil di simpan');

    }

    public function edit($id)
    {
        $user = User::find($id);
        $data['user'] = $user;
        return view('backend.pages.user.user_edit',$data);
    }
}
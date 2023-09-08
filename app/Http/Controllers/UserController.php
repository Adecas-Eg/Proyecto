<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    

    public function __construct(){
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.edit')->only('edit');
        $this->middleware('can:users.update')->only('update');
        
    }
    public function index()
    {

        $users = User::paginate(10);
        return view('admin.users.index',compact('users'));
    }

  

    public function edit(User $user)

    {
        $roles = Role::all();

        return view('admin.users.edit',compact('user','roles'));
    }

    public function update(Request $request, User $user)
    {

        $user->roles()->sync($request->roles);

        return redirect()->route('users.edit',$user)->with('info',"Se asigno los roles correctamente");
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ChangePassword extends Controller
{

    // protected $user;

    // public function __construct()
    // {
    //     Auth::logout();

    //     $id = intval(request()->id);
    //     $this->user = User::find($id);
    // }

    public function show(User $userNew)
    {
        return view('auth.change-password', compact('userNew'));
    }

    public function update(Request $request, User $userNew)
    {
        $userNew->password = $request->password;
        $userNew->status = 1;
        $userNew->save();
        Auth::login($userNew);
        return redirect()->route('casa.index');
    }
}
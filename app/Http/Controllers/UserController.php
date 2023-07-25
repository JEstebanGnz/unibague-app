<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(): \Inertia\Response
    {
        $users = User::all();
        return Inertia::render('User/Index',['users' => $users]);
       // return User::all(['name','email','qrCode','role_id']);
    }

    public function show(User $id){
        $user= User::find($id);
        if ($user === null){

            return response(['msg'=>'Id not found'],404);
        }

        return $user;
    }

    public function delete (int $id){
        $user= User::find($id);
        if ($user === null){
            return response(['msg'=>'Id not found'],404);
        }
        User::destroy($id);
        return response(['msg'=>'User deleted'],202);
    }

    public function update (Request $request, int $id){
        $user= User::find($id);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required',
        ]);
        if ($user === null){
            return response(['msg'=>'Id not found'],404);
        }


       $user -> name = $request ->get('name');
       $user -> email = $request ->get('email');
       $user->save();
       return $user;
    }
}

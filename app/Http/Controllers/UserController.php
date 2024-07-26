<?php

namespace App\Http\Controllers;


use App\Models\Role;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(): \Inertia\Response
    {
        $users = User::with('role')->get();
        $avaliableRoles = Role::all();
        return Inertia::render('User/Index', ['usersProp' => $users, 'avaliableRoles'=>$avaliableRoles]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'qrCode' => 'required',
            'role_id' => 'required',
        ]);

        User::create($request->all());
        return redirect()->route('users.index')->with('status', 'Profile updated!');
    }

    public function create(User $users)
    {
        return Inertia::render('User/Create', ['users' => $users]);
    }

    public function show(User $user)
    {
        return Inertia::render('User/Show', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'role_id' => 'required',
        ]);

        $user->fill($request->post())->save();
        return response('',201);

    }

    public function destroy(User $user)
    {
        $user -> delete();
        return Inertia::render('User/Index')->with('success','Company has been created successfully.');
    }


    public function getUserByToken(Request $request)
    {
        $token = $request -> input('token');
        $userFound = User::where('qrCode','=',$token)->first();
        {/* Now that the user was found, also save that user on the list of scanned users*/ }
        $userId = $userFound->id;
        $scannedBy = auth()->user()->id;

        //If the user has already been scanned, then don't insert the record
        $alreadyScannedUser = DB::table('scanned_users')
            ->where('user_id','=', $userId)->first();
        if(!$alreadyScannedUser){
            DB::table('scanned_users')
                ->insert(['user_id' => $userId,
                        'scanned_by' => $scannedBy]);
        }
        return $userFound->getPersonalInfo();
    }
}

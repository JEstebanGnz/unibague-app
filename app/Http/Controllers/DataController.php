<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function userInfo () {
        $user = auth()->user();
        $data = $user->getPersonalInfo();
        return response()->json($data);
    }
}
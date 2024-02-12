<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function userInfo () {
        $user = auth()->user();
        $data = $user->getPersonalInfo();

        if(count($data) === 0){
            throw new \RuntimeException('El usuario no posee ningún carnet activo');
        }

        return response()->json($data);
    }
}

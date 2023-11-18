<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;


class CarnetController extends Controller
{
    public function carnetView (): \Inertia\Response
    {
        {
            $user = auth()->user();
            //dd($user -> role->id);
            return Inertia::render('CarnetContainer', [
                'qrCode' => $user->qrCode,

            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminPannelController extends Controller
{
    public function adminPannelView (){
        {
            return Inertia::render('AdminPannel');
        }
    }
}

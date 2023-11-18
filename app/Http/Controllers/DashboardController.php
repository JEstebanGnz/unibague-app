<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function dashboardView(): \Inertia\Response
    {
        //        TODO: devolver solo los modulos a los que tiene permiso el usuario
        $modules = Module::getUserRoles();
        return Inertia::render('Dashboard',['modules' => $modules]);

    }
}

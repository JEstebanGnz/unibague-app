<?php

namespace App\Http\Controllers;


use App\Models\Module;
use App\Models\Role;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;


class ModuleController extends Controller
{
    public function index(): Response
    {

        $modules = Module::with('roles')->get();
        $avaliableRoles = Role::all();
        return Inertia::render('Module/Index', ['modulesProp' => $modules, 'availableRoles'=>$avaliableRoles]);
    }


    public function store(Request $request): Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required',
            'visible' => 'required',
            'type' => 'required',
            'payload' => 'required',
        ]);
        $data = $request->all();
        $data['payload'] = json_encode($data['payload']);
        unset($data['roles']);
        $module = Module::create($data);
        $module->roles()->sync($request->input('roles'));
        return response('',201);
    }

    public function create(Module $module): Response
    {
        return Inertia::render('Module/Index', ['module' => $module]);
    }

    public function show(Module $module): Response
    {
        return Inertia::render('Module/Show', ['module' => $module]);
    }

    public function update(Request $request, Module $module): Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required',
            'visible' => 'required',
            'type' => 'required',
            'roles' => 'required',
            'payload' => 'required',
        ]);
        $data = $request->all();
        $data['payload'] = json_encode($data['payload']);
        unset($data['roles']);
        $module->roles()->sync($request->input('roles'));
        $module->fill($data)->save();
        return response('',201);

    }

    public function destroy(Module $module): Response
    {
        $module -> delete();
        return Inertia::render('Module/Index')->with('success','Company has been created successfully.');
    }
}

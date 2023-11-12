<?php

namespace App\Http\Controllers;


use App\Models\Module;
use App\Models\Role;
use Illuminate\Http\Request;
use Inertia\Inertia;
use PhpParser\Node\Expr\AssignOp\Mod;

class ModuleController extends Controller
{
    public function index(): \Inertia\Response
    {

        $modules = Module::all();
        $avaliableRoles = Role::all();
        return Inertia::render('Module/Index', ['modulesProp' => $modules, 'availableRoles'=>$avaliableRoles]);
    }


    public function store(Request $request)
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

    public function create(Module $module)
    {
        return Inertia::render('Module/Index', ['module' => $module]);
    }

    public function show(Module $module)
    {
        return Inertia::render('Module/Show', ['module' => $module]);
    }

    public function update(Request $request, Module $module)
    {
        $request->validate([
            'name' => 'required',
            'permission_id' => 'required',
            'icon' => 'required',
            'visible' => 'required',
            'type' => 'required',
            'payload' => 'required',
        ]);

        $module->fill($request->post())->save();
        return redirect()->route('/modules')->with('success','Company Has Been updated successfully');

    }

    public function destroy(Module $module)
    {
        $module -> delete();
        return Inertia::render('Module/Index')->with('success','Company has been created successfully.');
    }
}

<?php

namespace App\Http\Controllers;


use App\Models\Module;
use Illuminate\Http\Request;
use Inertia\Inertia;
use PhpParser\Node\Expr\AssignOp\Mod;

class ModuleController extends Controller
{
    public function index(): \Inertia\Response
    {

        $modules = Module::all();
        return Inertia::render('Module/Index', ['modulesProp' => $modules]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'permission_id' => 'required',
            'icon' => 'required',
            'visible' => 'required',
        ]);

        Module::create($request->all());
        return redirect()->route('modules.index')->with('status', 'Profile updated!');
    }

    public function create(Module $module)
    {
        return Inertia::render('Module/Create', ['module' => $module]);
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

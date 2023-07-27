<?php

namespace App\Http\Controllers;


use App\Models\Permission;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PermissionController extends Controller
{
    public function index(): \Inertia\Response
    {
        $permissions = Permission::all();
        return Inertia::render('Permission/Index', ['permissionsProp' => $permissions]);
    }

    public function store(Request $request, Permission $permissions)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',

        ]);

        Permission::create($request->post());

        return redirect()->route('permissions.index')->with('success','Company has been created successfully.');
    }

    public function create(Permission $permission)
    {
        return Inertia::render('Permission/Create', ['permission' => $permission]);
    }

    public function show(Permission $permission)
    {
        return Inertia::render('Permission/Show', ['permission' => $permission]);
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $permission->fill($request->post())->save();
        return redirect()->route('permissions.index')->with('success','Company Has Been updated successfully');

    }

    public function destroy(Permission $permission)
    {
        $permission -> delete();
        return Inertia::render('Permission/Delete');
    }
}

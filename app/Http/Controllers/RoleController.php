<?php

namespace App\Http\Controllers;


use App\Models\Role;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoleController extends Controller
{
    public function index(): \Inertia\Response
    {
        $roles = Role::all();
        return Inertia::render('Role/Index', ['rolesProp' => $roles]);
    }

    public function store(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        Role::create($request->post());
        return redirect()->route('roles.index')->with('success', 'Company has been created successfully.');
    }

    public function create(Role $roles)
    {
        return Inertia::render('Role/Index', ['roles' => $roles]);
    }

    public function show(Role $roles)
    {
        return Inertia::render('Role/Index', ['roles' => $roles]);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string',

        ]);

        $role->fill($request->post())->save();
        return redirect()->route('/roles')->with('success', 'Company Has Been updated successfully');

    }

    public function destroy(Role $roles)
    {
        $roles->delete();
        return Inertia::render('Role/Index')->with('success', 'Company has been created successfully.');
    }
}

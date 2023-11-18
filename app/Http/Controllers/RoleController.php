<?php

namespace App\Http\Controllers;


use App\Models\Role;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class RoleController extends Controller
{
    public function index(): Response
    {
        $roles = Role::all();
        return Inertia::render('Role/Index', ['rolesProp' => $roles]);
    }

    public function store(Request $request, Role $role): void
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        Role::create($request->post());

    }

    public function create(Role $roles): Response
    {
        return Inertia::render('Role/Index', ['roles' => $roles]);
    }

    public function show(Role $roles): Response
    {
        return Inertia::render('Role/Index', ['roles' => $roles]);
    }

    public function update(Request $request, Role $role): void
    {
        $request->validate([
            'name' => 'required|string',

        ]);

        $role->fill($request->post())->save();
    }

    public function destroy(Role $role): Response
    {
        $role->delete();
        return Inertia::render('Role/Index')->with('success', 'Company has been created successfully.');
    }
}

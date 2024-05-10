<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('can:Listar Roles')->only('index');
        $this->middleware('can:Crear Roles')->only('store');
        $this->middleware('can:Del Roles')->only('destroy');
        $this->middleware('can:Asignar Permisos')->only('show', 'update');
    }

    public function index()
    {
        $roles = Role::all();
        return view('roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->input('name')]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $roleId)
    {
        $permisos = Permission::all();
        $rol = Role::find($roleId);
        $rolePermissions = $rol->permissions;

        return view('roles.asignarPermisos')->with('rol', $rol)->with('permisos', $permisos)
            ->with('rolePermissions', $rolePermissions);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $roleId)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::find($id);

        // Obtener los IDs de los permisos seleccionados
        $permisosIds = $request->input('permiso', []);

        // Buscar los modelos Permission usando los IDs
        $permisos = Permission::whereIn('id', $permisosIds)->get();

        // Asignar los permisos al rol
        $role->syncPermissions($permisos);

        // Redireccionar
        return redirect()->route('roles.index')->with('success', 'Permisos actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);
        $role->delete();
        return back();
    }
}

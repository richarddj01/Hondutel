<?php

namespace App\Http\Controllers;

use App\Models\tipo_usuario;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('can:Listar Usuarios')->only('index');
        $this->middleware('can:Crear Usuarios')->only('create', 'store');
        $this->middleware('can:Upd Usuarios')->only('edit', 'update');
        $this->middleware('can:Del Usuarios')->only('destroy');
    }

    public function index()
    {
        $users = DB::table('users')
            ->join('model_has_roles as model', 'model.model_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'model.role_id')
            ->select('users.id', 'roles.name as rol', 'users.name', 'users.email')
            ->get();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Roles::all();
        return view('users.usersForm')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Usuario = new User();
        $Usuario->name = $request->get('name');
        $Usuario->email = $request->get('email');
        $Usuario->password = bcrypt($request->get('password'));

        $Usuario->save();

        $Usuario->assignRole($request->get('rol'));

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $roles = Roles::all();
        $rolesUser = DB::table('roles')
            ->join('model_has_roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('model_has_roles.model_id', '=', $id)
            ->select('roles.id', 'roles.name as name')
            ->first();

        return view('users.usersForm')->with('user', $user)->with('roles', $roles)->with('rolesUser', $rolesUser);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $logText = strlen($request->input('password'));

        if ($logText >= 8 && $logText <= 16 && $request->input('password') != null) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        $user->syncRoles($request->input('rol'));

        return redirect('/users')->with('success', 'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect('/users')->with('success', 'Usuario eliminado correctamente');
    }
}

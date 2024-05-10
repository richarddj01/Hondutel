<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\cliente;
use App\Models\zona;
use App\Models\servicio;
use App\Models\telefono;
use App\Models\Averia;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::count();
        $clientes = cliente::count();
        $zonas = zona::count();
        $servicios = servicio::count();
        $telefonos = telefono::count();
        $averias = Averia::count();


        return view('dashboard', compact('users', 'clientes', 'zonas', 'servicios', 'telefonos', 'averias'));
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

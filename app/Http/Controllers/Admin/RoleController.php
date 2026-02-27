<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        // si pasa la validación
        Role::create([
            'name' => $request->name,
        ]);

        //Confirmacion de exito
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Rol creado exitosamente',
            'text' => 'El rol se creo correctamente',
        ]);

        // redireccionar a tabla principal
        return redirect(route('admin.roles.index'))->with('success', 'Rol creado exitosamente');
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
    public function edit(Role $role)
    {
        //
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        // Validar que se inserte bien y excluya la fila que se edita
        $request->validate([
            'name' => 'required|unique:roles,name,',
        ]);

        // Si pasa, editar el rol
        $role->update([
            'name' => $request->name,
        ]);

        // confirmacion de operacion exitosa
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Rol actualizado exitosamente',
            'text' => 'El rol se actualizo correctamente',
        ]);

        // redireccionar a tabla principal
        return redirect(route('admin.roles.index'))->with('success', 'Rol actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

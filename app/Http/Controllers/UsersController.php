<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //los datos ya estan validados
        $data = $request->validated();

        //hashear contraseña antes de guardar
        $data['password'] = bcrypt($data['password']);
        
        user::class($data);

        return redirect()->route('user.index')->with('success','usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(user $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $users)
    {
        //
    }
}

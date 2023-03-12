<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('petugas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
            'level' => 'required',
        ]);

        $request['password'] = bcrypt($request['password']);

        Petugas::create($request);

        return redirect('/petugas')->with('success', 'Petugas created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Petugas $petugas)
    {
        return view('petugas.edit', compact('petugases'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Petugas $petugas): RedirectResponse
    {
        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
            'level' => 'required',
        ]);

        $request['password'] = bcrypt($request['password']);

        $petugas->update($request->all());

        return redirect('/petugas')->with('success', 'Petugas updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Petugas $petugas): RedirectResponse
    {
        $petugas->delete();

        return redirect('/petugas')->with('success', 'Petugas deleted successfully.');
    }
}

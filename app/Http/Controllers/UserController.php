<?php

namespace App\Http\Controllers;
use DB;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = DB::table('users')->wherein('role', ['admin','petugas'])->get();

        return view('admin.akun.index',compact('user'));
    }
    public function akunmasyarakat()
    {
        $masyarakat = DB::table('users')->where('role', 'masyarakat')->get();

        return view('admin.akun.masyarakat',compact('masyarakat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.akun.create');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function userstore(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'nik' => 'required',
            'password' => 'required',
            'telp' => 'required',
            'role' => 'required',
        ]);
        $validateData['password'] = bcrypt($validateData['password']);
        
        User::create($validateData);
    
        return redirect('Auth.login')->with('success','Berhasil Menyimpan !');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nik' => 'required',
            'password' => 'required',
            'telp' => 'required',
            'role' => 'required',
        ]);
        $validateData['password'] = bcrypt($validateData['password']);
        
        User::create($validateData);
    
        return redirect('/admin')->with('success','Berhasil Menyimpan !');
    }

    public function registerakunadmin(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nik' => 'required',
            'password' => 'required',
            'telp' => 'required',
            'role' => 'required',
        ]);
        $validateData['password'] = bcrypt($validateData['password']);
        
        User::create($validateData);
    
        return redirect()->route('login.index')->with('success','Berhasil Menyimpan !');
    }
    /**
     * Display the specified resource.
     */
    public function show(User $user): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.akun.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4',
            'telp' => 'required',
            'nik' => 'required',
            'role' => 'required',
        ]);
        $validateData['password'] = bcrypt($validateData['password']);
        
        $user = User::findOrFail($id);
        $user->update($validateData);
    
        return redirect()->route('akun.index')->with('success','Berhasil Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user =  User::find($id);
        $user->delete();
        return redirect()->route('akun.index')->with('success','Berhasil Hapus!');
    }

   
}

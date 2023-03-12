<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Pengaduan;
use App\Models\Petugas;

use App\Http\Controllers\PengaduanController;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanggapans = Tanggapan::latest()->paginate(5);
    
        return view('tanggapan.index',compact('tanggapans'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id_petugas = Petugas::all();
        return view('tanggapan.create')->with('id_petugas', $id_petugas);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tanggapan = new Tanggapan; 
        if($request->hasfile('foto'))
        {
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$extention;
            $file->move('uploads/', $filename);
            $tanggapan->foto = $filename;
        }
        $tanggapan->id_pengaduan = $request->input('id_pengaduan');
        $tanggapan->tgl_tanggapan = $request->input('tgl_tanggapan');
        $tanggapan->tanggapan = $request->input('tanggapan');
        $tanggapan->id_petugas = $request->input('id_petugas');
        $tanggapan->save();

        return redirect()->route('pengaduan.index')->with('success', 'Berhasil Menyimpan!');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Tanggapan $tanggapan): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tanggapan $tanggapan)
    {
        return view('tanggapan.edit',compact('tanggapan'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tanggapan $tanggapan)
    {

        $tanggapan = new Tanggapan; 
        if($request->hasfile('foto'))
        {
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$extention;
            $file->move('uploads/', $filename);
            $tanggapan->foto = $filename;
        }
        $tanggapan->id_pengaduan = $request->input('id_pengaduan');
        $tanggapan->tgl_tanggapan = $request->input('tgl_tanggapan');
        $tanggapan->tanggapan = $request->input('tanggapan');
        $tanggapan->id_petugas = $request->input('id_petugas');
        $tanggapan->save();

        return redirect()->route('pengaduan.index')->with('success', 'Berhasil Menyimpan!');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tanggapan $tanggapan)
    {
        $tanggapan->delete();
        return redirect()->route('tanggapan.index')
                        ->with('success','Berhasil Menghapus !');
    }
    public function approve()
    {
        $tanggapan = new Tanggapan; 

        $tanggapan->id_tanggapan = $request->input('id_tanggapan');
        $tanggapan->id_pengaduan = $request->input('id_pengaduan');
        $tanggapan->tgl_tanggapan = $request->input('tgl_tanggapan');
        $pengaduan->save();

        return redirect()->route('pengaduan.index')->with('success', 'Berhasil Menyimpan!');

    }
    public function tanggapanpetugas()
    {
        $pengaduans = Pengaduan::latest()->paginate(5);
    
        return view('tanggapan.index',compact('pengaduans'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}

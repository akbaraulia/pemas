<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;

use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduans = Pengaduan::latest()->paginate(5);
    
        return view('pengaduan.index',compact('pengaduans'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengaduan.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pengaduan = new Pengaduan; 
        if($request->hasfile('foto'))
        {
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$extention;
            $file->move('uploads/', $filename);
            $pengaduan->foto = $filename;
        }
        $pengaduan->tgl_pengaduan = $request->input('tgl_pengaduan');
        $pengaduan->user_id = $request->input('user_id');
        $pengaduan->isi_laporan = $request->input('isi_laporan');
        $pengaduan->save();

        return redirect()->route('pengaduan.index')->with('success', 'Berhasil Menyimpan!');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengaduan  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengaduan $pengaduan)
    {
                return view('pengaduan.edit',compact('pengaduan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        $pengaduan = new Pengaduan; 
        if($request->hasfile('foto'))
        {
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$extention;
            $file->move('uploads/', $filename);
            $pengaduan->foto = $filename;
        }
        $pengaduan->tgl_pengaduan = $request->input('tgl_pengaduan');
        $pengaduan->user_id = $request->input('user_id');
        $pengaduan->isi_laporan = $request->input('isi_laporan');
        $pengaduan->save();

        return redirect()->route('pengaduan.index')->with('success', 'Berhasil Menyimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();
     
        return redirect()->route('pengaduan.index')
                        ->with('success','Berhasil Hapus !');
    }
    public function pengaduanpetugas()
    {
        $pengaduans = Pengaduan::latest()->paginate(5);
    
        return view('pengaduan.index',compact('pengaduans'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function pengaduanadmin()
    {
        $pengaduans = Pengaduan::latest()->paginate(5);
    
        return view('pengaduan.index',compact('pengaduans'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function historyadmin()
    {
        $pengaduans = Pengaduan::latest()->paginate(5);
    
        return view('pengaduan.history',compact('pengaduans'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
//     public function approval(Request $request)
// {
//     // Mendapatkan data yang ingin diubah statusnya
//     $pengaduan = Pengaduan::find($status);

//     // Memperbarui status data menjadi 'approved'
//     $data->status = 'on_progress';
//     $data->save();

//     // Mengembalikan ke halaman sebelumnya dengan pesan sukses
//     return redirect()->back()->with('success', 'Data berhasil disetujui.');
// }


public function approve(Request $request, $pengaduan)
    {
        $pengaduan = Pengaduan::find($pengaduan);
        $pengaduan->status = $request->input('status');
        $pengaduan->update();
        return redirect()->back()->with('success', 'Data berhasil disetujui.');


    }
}
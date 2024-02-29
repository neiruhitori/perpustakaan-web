<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = Peminjaman::orderBy('created_at', 'DESC')->get();
        $buku = Buku::all();
        return view('peminjaman.index', compact('peminjaman', 'buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peminjaman = Peminjaman::all();
        $buku = Buku::all();
        return view('peminjaman.create', compact('peminjaman', 'buku'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Peminjaman::create([
                    'buku' => $request->buku,
                    'name' => $request->name,
                    'kelas' => $request->kelas,
                    'jml_buku' => $request->jml_buku,
                    'jam_pinjam' => $request->jam_pinjam,
                    'jam_kembali' => $request->jam_kembali,
                    'description' => $request->description
                ]);
                return redirect('/peminjaman')->with('success', 'Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        return view('peminjaman.show', compact('peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        return view('peminjaman.edit', compact('peminjaman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update($request->all());

        return redirect()->route('peminjaman')->with('success', 'peminjaman updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
  
        $peminjaman->delete();
  
        return redirect()->route('peminjaman')->with('success', 'peminjaman deleted successfully');
    }
    
    // public function peminjaman()
    // {
    //     $buku = Buku::all();
    //     $peminjaman = Peminjaman::all();
    //     return view('data-master.peminjaman', compact('buku', 'peminjaman'));
    // }

    // public function createpeminjaman(Request $request)
    // {
    //     Peminjaman::create([
    //         'buku_id' => $request->buku_id,
    //         'name' => $request->name,
    //         'kelas' => $request->kelas,
    //         'jml_buku' => $request->jml_buku,
    //         'tgl_pinjam' => $request->tgl_pinjam,
    //         'tgl_kembali' => $request->tgl_kembali,
    //     ]);
    //     return redirect('/peminjaman')->with('success', 'Data Berhasil di Tambahkan');
    // }

    // public function editpeminjaman($id)
    // {
    //     $editpeminjaman = Peminjaman::find($id);
    //     $editbuku = Buku::find($id);
    //     return view('data-master.editpeminjaman', compact('editpeminjaman', 'editbuku'));
    // }

    // public function updatepeminjaman(Request $request, $id)
    // {
    //     $editpeminjaman = Peminjaman::find($id);
    //     $editpeminjaman->buku_id = $request->input('buku_id');
    //     $editpeminjaman->name = $request->input('name');
    //     $editpeminjaman->kelas = $request->input('kelas');
    //     $editpeminjaman->jml_buku = $request->input('jml_buku');
    //     $editpeminjaman->tgl_pinjam = $request->input('tgl_pinjam');
    //     $editpeminjaman->tgl_kembali = $request->input('tgl_kembali');
    //     $editpeminjaman->update();
    //     return redirect('/peminjaman')->with('status', 'Student Updated Successfully');
    // }

    // public function destroy($id)
    // {
    //     $dpeminjaman   = Peminjaman::find($id);
    //     $dpeminjaman->forceDelete();

    //     return redirect()->back()->with('status', 'Student Deleted Successfully');
    // }
}

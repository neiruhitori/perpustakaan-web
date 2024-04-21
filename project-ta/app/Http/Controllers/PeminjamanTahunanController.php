<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeminjamanTahunan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PeminjamanTahunanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();
        
        if ($request->has('search')) {
            $peminjamantahunan = PeminjamanTahunan::where('name', 'LIKE', '%' .$request->search. '%')->paginate(5);
        } else {
            $peminjamantahunan = PeminjamanTahunan::orderBy('created_at', 'DESC')->paginate(10);
        }
        return view('peminjamantahunan.index', compact('peminjamantahunan', 'profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();

        $peminjamantahunan = PeminjamanTahunan::all();
        return view('peminjamantahunan.create', compact('peminjamantahunan', 'profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'buku' => 'required|min:1|max:50',
            'name' => 'required|min:1|max:50',
            'kelas' => 'required|min:1|max:50',
            'jml_buku' => 'required|min:1|max:50',
            'jam_pinjam' => 'required:true',
            'jam_kembali' => 'required:true',
            'kodebuku' => 'required:true',
        ]);
        
        PeminjamanTahunan::create([
                    'buku' => $request->buku,
                    'kodebuku' => $request->kodebuku,
                    'name' => $request->name,
                    'kelas' => $request->kelas,
                    'jml_buku' => $request->jml_buku,
                    'jam_pinjam' => $request->jam_pinjam,
                    'jam_kembali' => $request->jam_kembali,
                    'description' => $request->description
                ]);
                return redirect('/peminjamantahunan')->with('success', 'Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();
        
        $peminjamantahunan = PeminjamanTahunan::findOrFail($id);
        return view('peminjamantahunan.show', compact('peminjamantahunan', 'profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();
        
        $peminjamantahunan = PeminjamanTahunan::findOrFail($id);
        return view('peminjamantahunan.edit', compact('peminjamantahunan', 'profile'));
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
        $peminjamantahunan = PeminjamanTahunan::findOrFail($id);
        $peminjamantahunan->update($request->all());

        return redirect()->route('peminjamantahunan')->with('success', 'peminjaman updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjamantahunan = PeminjamanTahunan::findOrFail($id);
  
        $peminjamantahunan->delete();
  
        return redirect()->route('peminjamantahunan')->with('success', 'peminjaman deleted successfully');
    }
}

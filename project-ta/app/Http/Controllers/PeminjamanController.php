<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
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
            $peminjaman = Peminjaman::where('name', 'LIKE', '%' .$request->search. '%')->paginate(5);
        } else {
            $peminjaman = Peminjaman::orderBy('created_at', 'DESC')->paginate(10);
        }
        return view('peminjaman.index', compact('peminjaman', 'profile'));
        
        /* -------dibawah ini adalah sebelum adanya fitur search-------*/
        // $peminjaman = Peminjaman::orderBy('created_at', 'DESC')->paginate(10);
        // return view('peminjaman.index', compact('peminjaman'));
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

        $peminjaman = Peminjaman::all();
        return view('peminjaman.create', compact('peminjaman', 'profile'));
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
        ]);
        
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
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();
        
        $peminjaman = Peminjaman::findOrFail($id);
        return view('peminjaman.show', compact('peminjaman', 'profile'));
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
        
        $peminjaman = Peminjaman::findOrFail($id);
        return view('peminjaman.edit', compact('peminjaman', 'profile'));
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
}

<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Bukucrud;
use Illuminate\Http\Request;
use App\Models\PeminjamanTahunan;
use App\Models\User;
use App\Models\Siswa;
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
        $profile = User::where('id', $iduser)->first();

        if ($request->has('search')) {
            $peminjamantahunan = PeminjamanTahunan::where('name', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $peminjamantahunan = PeminjamanTahunan::orderBy('updated_at', 'DESC')->paginate(10);
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
        $profile = User::where('id', $iduser)->first();

        $peminjamantahunan = PeminjamanTahunan::all();
        $siswa = Siswa::all();
        return view('peminjamantahunan.create', compact('peminjamantahunan', 'siswa', 'profile'));
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
            'kls' => 'required:true',
            'absen' => 'required:true',
            'tgl' => 'required:true',
            // 'kode_pinjam' => 'required:true',
            'name' => 'required:true',
            'kelas' => 'required:true',
            'jam_pinjam' => 'required:true',
            'jam_kembali' => 'required:true',
        ]);

        $kode_pinjam = $request->kls . '' . $request->absen . '-' . $request->tgl;
        $name = $request->name;
        $kelas = $request->kelas;
        $jam_pinjam = $request->jam_pinjam;
        $jam_kembali = $request->jam_kembali;
        $description = $request->description;

        // Simpan ke database
        $yourModel = new PeminjamanTahunan();
        $yourModel->kode_pinjam = $kode_pinjam;
        $yourModel->name = $name;
        $yourModel->kelas = $kelas;
        $yourModel->jam_pinjam = $jam_pinjam;
        $yourModel->jam_kembali = $jam_kembali;
        $yourModel->description = $description;
        $yourModel->save();


        // PeminjamanTahunan::create([
        //     'kode_pinjam' => $request->kode_pinjam,
        //     'name' => $request->name,
        //     'kelas' => $request->kelas,
        //     'jam_pinjam' => $request->jam_pinjam,
        //     'jam_kembali' => $request->jam_kembali,
        //     'description' => $request->description
        // ]);

        // $buku = $request->buku;
        // $kodebuku = $request->kodebuku;
        // $jml_buku = $request->jml_buku;

        // for ($i=0; $i < count($buku); $i++) { 
        //     $datasave = [
        //         'name' => $request->name,
        //         'buku' => $buku[$i],
        //         'kodebuku' => $kodebuku[$i],
        //         'jml_buku' => $jml_buku[$i],
        //         'kelas' => $request->kelas,
        //         'jam_pinjam' => $request->jam_pinjam,
        //         'jam_kembali' => $request->jam_kembali,
        //         'description' => $request->description,
        //     ];
        //     PeminjamanTahunan::insert($datasave);
        // }
        return redirect('/peminjamantahunan')->with('success', 'Data Berhasil di Tambahkan');
    }

    public function createbuku()
    {
        $iduser = Auth::id();
        $profile = User::where('id', $iduser)->first();

        $peminjamantahunanbuku = PeminjamanTahunan::all();
        $siswa = Siswa::all();
        $bukucrud = Bukucrud::all();
        return view('peminjamantahunan.createbuku', compact('peminjamantahunanbuku', 'bukucrud', 'siswa', 'profile'));
    }

    public function storebuku(Request $request)
    {
        $this->validate($request, [
            'peminjamantahunan_id' => 'required|min:1|max:50',
            'buku' => 'required|min:1|max:50',
            'jml_buku' => 'required:true',
            'kodebuku' => 'required:true',
        ]);
        Buku::create([
            'peminjamantahunan_id' => $request->peminjamantahunan_id,
            'buku' => $request->buku,
            'jml_buku' => $request->jml_buku,
            'kodebuku' => $request->kodebuku,
        ]);
        return redirect('/peminjamantahunan')->with('success', 'Data Berhasil di Tambahkan');
    }

    public function show(string $id)
    {
        $iduser = Auth::id();
        $profile = User::where('id', $iduser)->first();

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
        $profile = User::where('id', $iduser)->first();

        $peminjamantahunan = PeminjamanTahunan::findOrFail($id);
        $siswa = Siswa::all();
        return view('peminjamantahunan.edit', compact('peminjamantahunan', 'siswa', 'profile'));
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

        return redirect()->route('peminjamantahunan')->with('success', 'Peminjaman updated successfully');
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

        return redirect()->route('peminjamantahunan')->with('success', 'Peminjaman deleted successfully');
    }

    public function removeAll(){
        PeminjamanTahunan::query()->forceDelete();
        return redirect()->route('peminjamantahunan')->with('removeAll', 'Reset data Peminjaman Tahunan successfully');
    }
}

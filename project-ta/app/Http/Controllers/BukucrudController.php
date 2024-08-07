<?php

namespace App\Http\Controllers;

use App\Models\Bukucrud;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BukucrudController extends Controller
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
            $buku = Bukucrud::where('buku', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $buku = Bukucrud::orderBy('created_at', 'DESC')->paginate(10);
        }
        return view('buku.index', compact('buku', 'profile'));
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

        $buku = Bukucrud::all();
        return view('buku.create', compact('buku', 'profile'));
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
            'penulis' => 'required|min:1|max:50',
            'penerbit' => 'required|min:1|max:50',
            'stok' => 'required:true',
        ]);

        $data = Bukucrud::create($request->all());

        if($request->hasFile('foto')){
            $request->file('foto')->move('gambarbukutahunan/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        // Bukucrud::create([
        //     'buku' => $request->buku,
        //     'penulis' => $request->penulis,
        //     'penerbit' => $request->penerbit,
        //     'description' => $request->buku,
        // ]);
        return redirect('/buku')->with('success', 'Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();
        
        $buku = Bukucrud::findOrFail($id);
        return view('buku.show', compact('buku', 'profile'));
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
        
        $buku = Bukucrud::findOrFail($id);
        return view('buku.edit', compact('buku', 'profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'buku' => 'required|min:1|max:50',
            'penulis' => 'required|min:1|max:50',
            'penerbit' => 'required|min:1|max:50',
        ]);

        $data = Bukucrud::findOrFail($id);
        $data->update($request->all());

        if ($request->hasFile('foto')) {
            // Delete old photo if it exists
            if ($data->foto && file_exists(public_path('gambarbukutahunan/' . $data->foto))) {
                unlink(public_path('gambarbukutahunan/' . $data->foto));
            }

            // Store the new photo
            $request->file('foto')->move('gambarbukutahunan/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        return redirect('/buku')->with('success', 'Data Berhasil di Update');
    }
    // {
    //     $buku = Bukucrud::findOrFail($id);
    //     $buku->update($request->all());

    //     return redirect()->route('buku')->with('success', 'buku updated successfully');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Bukucrud::findOrFail($id);
  
        $buku->delete();
  
        return redirect()->route('buku')->with('success', 'buku deleted successfully');
    }

    public function removeAll(){
        Bukucrud::query()->forceDelete();
        return redirect()->route('buku')->with('removeAll', 'Reset data Buku Tahunan successfully');
    }
}

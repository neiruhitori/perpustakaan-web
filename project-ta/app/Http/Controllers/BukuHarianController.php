<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bukusharian;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BukuHarianController extends Controller
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
            $bukuharian = Bukusharian::where('buku', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $bukuharian = Bukusharian::orderBy('created_at', 'DESC')->paginate(10);
        }
        return view('bukuharian.index', compact('bukuharian', 'profile'));
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

        $bukuharian = Bukusharian::all();
        return view('bukuharian.create', compact('bukuharian', 'profile'));
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

        $data = Bukusharian::create($request->all());

        if($request->hasFile('foto')){
            $request->file('foto')->move('gambarbukuharian/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect('/bukuharian')->with('success', 'Data Berhasil di Tambahkan');
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
        
        $bukuharian = Bukusharian::findOrFail($id);
        return view('bukuharian.show', compact('bukuharian', 'profile'));
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
        
        $bukuharian = Bukusharian::findOrFail($id);
        return view('bukuharian.edit', compact('bukuharian', 'profile'));
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
            'stok' => 'required:true',
        ]);

        $data = Bukusharian::findOrFail($id);
        $data->update($request->all());

        if ($request->hasFile('foto')) {
            // Delete old photo if it exists
            if ($data->foto && file_exists(public_path('gambarbukuharian/' . $data->foto))) {
                unlink(public_path('gambarbukuharian/' . $data->foto));
            }

            // Store the new photo
            $request->file('foto')->move('gambarbukuharian/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('bukuharian')->with('success', 'buku updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bukuharian = Bukusharian::findOrFail($id);
  
        $bukuharian->delete();
  
        return redirect()->route('bukuharian')->with('success', 'buku deleted successfully');
    }

    public function removeAll(){
        Bukusharian::query()->forceDelete();
        return redirect()->route('bukuharian')->with('removeAll', 'Reset data Buku Harian successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CatatanHarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();
        
        if ($request->has('search')) {
            $catatan = Peminjaman::where('name', 'LIKE', '%' .$request->search. '%')->paginate(5);
        } else {
            $catatan = Peminjaman::orderBy('created_at', 'DESC')->paginate(10);
        }
        return view('catatanharian.catatan', compact('catatan', 'profile'));
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
        
        $catatan = Peminjaman::findOrFail($id);
        return view('catatanharian.show', compact('catatan', 'profile'));
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
        
        $catatan = Peminjaman::findOrFail($id);
        return view('catatanharian.edit', compact('catatan', 'profile'));
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
        $catatan = Peminjaman::findOrFail($id);
        $catatan->update([
            'description' => $request->description,
        ]);

        return redirect()->route('catatanharian')->with('success', 'catatan updated successfully');
    }
}

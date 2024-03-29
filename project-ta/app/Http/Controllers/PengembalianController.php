<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class PengembalianController extends Controller
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
            $pengembalian = Peminjaman::where('name', 'LIKE', '%' .$request->search. '%')->paginate(5);
        } else {
            $pengembalian = Peminjaman::orderBy('created_at', 'DESC')->paginate(10);
        }
        return view('pengembalian.index', compact('pengembalian', 'profile'));
        
        /* -------dibawah ini adalah sebelum adanya fitur search-------*/
        // $pengembalian = Peminjaman::orderBy('created_at', 'DESC')->paginate(10);
        // return view('pengembalian.index', compact('pengembalian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengembalian = Peminjaman::findOrFail($id);
  
        $pengembalian->delete();
  
        return redirect()->route('pengembalian')->with('success', 'peminjaman deleted successfully');
    }

    public function status($id)
    {
        $pengembalian = Peminjaman::where('id', $id)->update([
            'status'=>0
        ]);
        return redirect()->route('pengembalian', compact('pengembalian'))->with('success', 'Peminjaman selesai successfully');
    }

    
    public function view_pdf()
    {
        $pengembalian = Peminjaman::orderBy('name', 'ASC')->get();
        $pdf = Pdf::loadView('pengembalian.pdf', ['pengembalian' => $pengembalian]);
        return $pdf->stream('data-perpustakaan.pdf');
    }
}

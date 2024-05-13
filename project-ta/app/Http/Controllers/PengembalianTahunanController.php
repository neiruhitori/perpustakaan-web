<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeminjamanTahunan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class PengembalianTahunanController extends Controller
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
            $pengembaliantahunan = PeminjamanTahunan::where('name', 'LIKE', '%' .$request->search. '%')->paginate(5);
        } else {
            $pengembaliantahunan = PeminjamanTahunan::orderBy('updated_at', 'DESC')->paginate(10);
        }
        return view('pengembaliantahunan.index', compact('pengembaliantahunan', 'profile'));
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
        $pengembaliantahunan = PeminjamanTahunan::findOrFail($id);
  
        $pengembaliantahunan->delete();
  
        return redirect()->route('pengembaliantahunan')->with('success', 'peminjaman deleted successfully');
    }

    public function status($id)
    {
        $pengembaliantahunan = PeminjamanTahunan::where('id', $id)->update([
            'status'=>0
        ]);
        return redirect()->route('pengembaliantahunan', compact('pengembaliantahunan'))->with('success', 'Peminjaman selesai successfully');
    }

    
    public function view_pdf()
    {
        $pengembaliantahunan = PeminjamanTahunan::orderBy('name', 'ASC')->get();
        $pdf = Pdf::loadView('pengembaliantahunan.pdf', ['pengembaliantahunan' => $pengembaliantahunan]);
        return $pdf->stream('data-perpustakaan.pdf');
    }
}

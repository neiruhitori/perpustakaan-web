<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanTahunan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SelesaiMeminjamTahunanController extends Controller
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
        

        $selesaimeminjamtahunan = PeminjamanTahunan::where('status', 0)->get();

        return view('selesaimeminjamtahunan.index', compact('selesaimeminjamtahunan', 'profile'));
    }

    public function view_pdf()
    {
        $selesaimeminjamtahunan = PeminjamanTahunan::where('status', 0)->get();
        $pdf = Pdf::loadView('selesaimeminjamtahunan.pdf', ['selesaimeminjamtahunan' => $selesaimeminjamtahunan]);
        return $pdf->stream('data-perpustakaan.pdf');
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
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

use App\Models\PeminjamanTahunan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    // Untuk Index Kelas =============================================================================
    public function index_vii()
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();

        return view('kelas.vii', compact('profile'));
    }

    public function index_viii()
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();     

        return view('kelas.viii', compact('profile'));
    }

    public function index_ix()
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();

        return view('kelas.ix', compact('profile'));
    }
    //====================================================================================================


    // Untuk isi Kelas VII A ==============================================================================
    public function kelas_viia(Request $request)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();   

        $viia = PeminjamanTahunan::where('kelas', 'VII A')->orderBy('name', 'ASC')->paginate(35);

        return view('kelas.vii.a', compact('viia', 'profile'));
    }

    public function search_viia(Request $request)
    {
        $search = $request->search;
        $viia = PeminjamanTahunan::where(function($query) use ($search){
            $query->where('name','like',"%$search%")->where('kelas', 'VII A');
        })
        ->orWhereHas('bukus', function($query) use($search){
            $query->where('kodebuku', 'like', "%$search%")->where('kelas', 'VII A');
        })
        ->get();
        return view('kelas.vii.a', compact('viia','search'));
    }

    public function pdf_viia()
    {
        $viia = PeminjamanTahunan::where('kelas', 'VII A')->get();
        $pdf = Pdf::loadView('kelas.vii.pdf_a', ['viia' => $viia]);
        return $pdf->stream('data-perpustakaan-VII-A.pdf');
    }
    // ====================================================================================================
    // Untuk isi Kelas VII B ==============================================================================
    public function kelas_viib(Request $request)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();   

        $viib = PeminjamanTahunan::where('kelas', 'VII B')->orderBy('name', 'ASC')->paginate(35);

        return view('kelas.vii.b', compact('viib', 'profile'));
    }

    public function search_viib(Request $request)
    {
        $search = $request->search;
        $viib = PeminjamanTahunan::where(function($query) use ($search){
            $query->where('name','like',"%$search%")->where('kelas', 'VII B');
        })
        ->orWhereHas('bukus', function($query) use($search){
            $query->where('kodebuku', 'like', "%$search%")->where('kelas', 'VII B');
        })
        ->get();
        return view('kelas.vii.b', compact('viib','search'));
    }

    public function pdf_viib()
    {
        $viib = PeminjamanTahunan::where('kelas', 'VII B')->get();
        $pdf = Pdf::loadView('kelas.vii.pdf_b', ['viib' => $viib]);
        return $pdf->stream('data-perpustakaan-VII-B.pdf');
    }
    // ====================================================================================================
    // Untuk isi Kelas VII C ==============================================================================
    public function kelas_viic(Request $request)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();   

        $viic = PeminjamanTahunan::where('kelas', 'VII C')->orderBy('name', 'ASC')->paginate(35);

        return view('kelas.vii.c', compact('viic', 'profile'));
    }

    public function search_viic(Request $request)
    {
        $search = $request->search;
        $viic = PeminjamanTahunan::where(function($query) use ($search){
            $query->where('name','like',"%$search%")->where('kelas', 'VII C');
        })
        ->orWhereHas('bukus', function($query) use($search){
            $query->where('kodebuku', 'like', "%$search%")->where('kelas', 'VII C');
        })
        ->get();
        return view('kelas.vii.c', compact('viic','search'));
    }

    public function pdf_viic()
    {
        $viic = PeminjamanTahunan::where('kelas', 'VII C')->get();
        $pdf = Pdf::loadView('kelas.vii.pdf_c', ['viic' => $viic]);
        return $pdf->stream('data-perpustakaan-VII-C.pdf');
    }
    // ====================================================================================================
    // Untuk isi Kelas VII D ==============================================================================
    public function kelas_viid(Request $request)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();   

        $viid = PeminjamanTahunan::where('kelas', 'VII D')->orderBy('name', 'ASC')->paginate(35);

        return view('kelas.vii.d', compact('viid', 'profile'));
    }

    public function search_viid(Request $request)
    {
        $search = $request->search;
        $viid = PeminjamanTahunan::where(function($query) use ($search){
            $query->where('name','like',"%$search%")->where('kelas', 'VII D');
        })
        ->orWhereHas('bukus', function($query) use($search){
            $query->where('kodebuku', 'like', "%$search%")->where('kelas', 'VII D');
        })
        ->get();
        return view('kelas.vii.d', compact('viid','search'));
    }

    public function pdf_viid()
    {
        $viid = PeminjamanTahunan::where('kelas', 'VII D')->get();
        $pdf = Pdf::loadView('kelas.vii.pdf_d', ['viid' => $viid]);
        return $pdf->stream('data-perpustakaan-VII-D.pdf');
    }
    // ====================================================================================================
    // Untuk isi Kelas VII E ==============================================================================
    public function kelas_viie(Request $request)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();   

        $viie = PeminjamanTahunan::where('kelas', 'VII E')->orderBy('name', 'ASC')->paginate(35);

        return view('kelas.vii.e', compact('viie', 'profile'));
    }

    public function search_viie(Request $request)
    {
        $search = $request->search;
        $viie = PeminjamanTahunan::where(function($query) use ($search){
            $query->where('name','like',"%$search%")->where('kelas', 'VII E');
        })
        ->orWhereHas('bukus', function($query) use($search){
            $query->where('kodebuku', 'like', "%$search%")->where('kelas', 'VII E');
        })
        ->get();
        return view('kelas.vii.e', compact('viie','search'));
    }

    public function pdf_viie()
    {
        $viie = PeminjamanTahunan::where('kelas', 'VII E')->get();
        $pdf = Pdf::loadView('kelas.vii.pdf_e', ['viie' => $viie]);
        return $pdf->stream('data-perpustakaan-VII-E.pdf');
    }
    // ====================================================================================================
    // Untuk isi Kelas VII F ==============================================================================
    public function kelas_viif(Request $request)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();   

        $viif = PeminjamanTahunan::where('kelas', 'VII F')->orderBy('name', 'ASC')->paginate(35);

        return view('kelas.vii.f', compact('viif', 'profile'));
    }

    public function search_viif(Request $request)
    {
        $search = $request->search;
        $viif = PeminjamanTahunan::where(function($query) use ($search){
            $query->where('name','like',"%$search%")->where('kelas', 'VII F');
        })
        ->orWhereHas('bukus', function($query) use($search){
            $query->where('kodebuku', 'like', "%$search%")->where('kelas', 'VII F');
        })
        ->get();
        return view('kelas.vii.f', compact('viif','search'));
    }

    public function pdf_viif()
    {
        $viif = PeminjamanTahunan::where('kelas', 'VII F')->get();
        $pdf = Pdf::loadView('kelas.vii.pdf_f', ['viif' => $viif]);
        return $pdf->stream('data-perpustakaan-VII-F.pdf');
    }
    // ====================================================================================================
    // Untuk isi Kelas VII G ==============================================================================
    public function kelas_viig(Request $request)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();   

        $viig = PeminjamanTahunan::where('kelas', 'VII G')->orderBy('name', 'ASC')->paginate(35);

        return view('kelas.vii.g', compact('viig', 'profile'));
    }

    public function search_viig(Request $request)
    {
        $search = $request->search;
        $viig = PeminjamanTahunan::where(function($query) use ($search){
            $query->where('name','like',"%$search%")->where('kelas', 'VII G');
        })
        ->orWhereHas('bukus', function($query) use($search){
            $query->where('kodebuku', 'like', "%$search%")->where('kelas', 'VII G');
        })
        ->get();
        return view('kelas.vii.g', compact('viig','search'));
    }

    public function pdf_viig()
    {
        $viig = PeminjamanTahunan::where('kelas', 'VII G')->get();
        $pdf = Pdf::loadView('kelas.vii.pdf_g', ['viig' => $viig]);
        return $pdf->stream('data-perpustakaan-VII-G.pdf');
    }
    // ====================================================================================================
    // Untuk isi Kelas VIII A ==============================================================================
    public function kelas_viiia(Request $request)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();   

        $viiia = PeminjamanTahunan::where('kelas', 'VIII A')->orderBy('name', 'ASC')->paginate(35);

        return view('kelas.viii.a', compact('viiia', 'profile'));
    }

    public function search_viiia(Request $request)
    {
        $search = $request->search;
        $viiia = PeminjamanTahunan::where(function($query) use ($search){
            $query->where('name','like',"%$search%")->where('kelas', 'VIII A');
        })
        ->orWhereHas('bukus', function($query) use($search){
            $query->where('kodebuku', 'like', "%$search%")->where('kelas', 'VIII A');
        })
        ->get();
        return view('kelas.viii.a', compact('viiia','search'));
    }

    public function pdf_viiia()
    {
        $viiia = PeminjamanTahunan::where('kelas', 'VIII A')->get();
        $pdf = Pdf::loadView('kelas.viii.pdf_a', ['viiia' => $viiia]);
        return $pdf->stream('data-perpustakaan-VIII-A.pdf');
    }
    // ====================================================================================================
    // Untuk isi Kelas VIII B ==============================================================================
    public function kelas_viiib(Request $request)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();   

        $viiib = PeminjamanTahunan::where('kelas', 'VIII B')->orderBy('name', 'ASC')->paginate(35);

        return view('kelas.viii.b', compact('viiib', 'profile'));
    }

    public function search_viiib(Request $request)
    {
        $search = $request->search;
        $viiib = PeminjamanTahunan::where(function($query) use ($search){
            $query->where('name','like',"%$search%")->where('kelas', 'VIII B');
        })
        ->orWhereHas('bukus', function($query) use($search){
            $query->where('kodebuku', 'like', "%$search%")->where('kelas', 'VIII B');
        })
        ->get();
        return view('kelas.viii.b', compact('viiib','search'));
    }

    public function pdf_viiib()
    {
        $viiib = PeminjamanTahunan::where('kelas', 'VIII B')->get();
        $pdf = Pdf::loadView('kelas.viii.pdf_b', ['viiib' => $viiib]);
        return $pdf->stream('data-perpustakaan-VIII-B.pdf');
    }
    // ====================================================================================================
    // Untuk isi Kelas VIII C ==============================================================================
    public function kelas_viiic(Request $request)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();   

        $viiic = PeminjamanTahunan::where('kelas', 'VIII C')->orderBy('name', 'ASC')->paginate(35);

        return view('kelas.viii.c', compact('viiic', 'profile'));
    }

    public function search_viiic(Request $request)
    {
        $search = $request->search;
        $viiic = PeminjamanTahunan::where(function($query) use ($search){
            $query->where('name','like',"%$search%")->where('kelas', 'VIII C');
        })
        ->orWhereHas('bukus', function($query) use($search){
            $query->where('kodebuku', 'like', "%$search%")->where('kelas', 'VIII C');
        })
        ->get();
        return view('kelas.viii.c', compact('viiic','search'));
    }

    public function pdf_viiic()
    {
        $viiic = PeminjamanTahunan::where('kelas', 'VIII C')->get();
        $pdf = Pdf::loadView('kelas.viii.pdf_c', ['viiic' => $viiic]);
        return $pdf->stream('data-perpustakaan-VIII-C.pdf');
    }
    // ====================================================================================================
    // Untuk isi Kelas VIII D ==============================================================================
    public function kelas_viiid(Request $request)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();   

        $viiid = PeminjamanTahunan::where('kelas', 'VIII D')->orderBy('name', 'ASC')->paginate(35);

        return view('kelas.viii.d', compact('viiid', 'profile'));
    }

    public function search_viiid(Request $request)
    {
        $search = $request->search;
        $viiid = PeminjamanTahunan::where(function($query) use ($search){
            $query->where('name','like',"%$search%")->where('kelas', 'VIII D');
        })
        ->orWhereHas('bukus', function($query) use($search){
            $query->where('kodebuku', 'like', "%$search%")->where('kelas', 'VIII D');
        })
        ->get();
        return view('kelas.viii.d', compact('viiid','search'));
    }

    public function pdf_viiid()
    {
        $viiid = PeminjamanTahunan::where('kelas', 'VIII D')->get();
        $pdf = Pdf::loadView('kelas.viii.pdf_d', ['viiid' => $viiid]);
        return $pdf->stream('data-perpustakaan-VIII-D.pdf');
    }
    // ====================================================================================================
    // Untuk isi Kelas VIII E ==============================================================================
    public function kelas_viiie(Request $request)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();   

        $viiie = PeminjamanTahunan::where('kelas', 'VIII E')->orderBy('name', 'ASC')->paginate(35);

        return view('kelas.viii.e', compact('viiie', 'profile'));
    }

    public function search_viiie(Request $request)
    {
        $search = $request->search;
        $viiie = PeminjamanTahunan::where(function($query) use ($search){
            $query->where('name','like',"%$search%")->where('kelas', 'VIII E');
        })
        ->orWhereHas('bukus', function($query) use($search){
            $query->where('kodebuku', 'like', "%$search%")->where('kelas', 'VIII E');
        })
        ->get();
        return view('kelas.viii.e', compact('viiie','search'));
    }

    public function pdf_viiie()
    {
        $viiie = PeminjamanTahunan::where('kelas', 'VIII E')->get();
        $pdf = Pdf::loadView('kelas.viii.pdf_e', ['viiie' => $viiie]);
        return $pdf->stream('data-perpustakaan-VIII-E.pdf');
    }
    // ====================================================================================================
    // Untuk isi Kelas VIII F ==============================================================================
    public function kelas_viiif(Request $request)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();   

        $viiif = PeminjamanTahunan::where('kelas', 'VIII F')->orderBy('name', 'ASC')->paginate(35);

        return view('kelas.viii.f', compact('viiif', 'profile'));
    }

    public function search_viiif(Request $request)
    {
        $search = $request->search;
        $viiif = PeminjamanTahunan::where(function($query) use ($search){
            $query->where('name','like',"%$search%")->where('kelas', 'VIII F');
        })
        ->orWhereHas('bukus', function($query) use($search){
            $query->where('kodebuku', 'like', "%$search%")->where('kelas', 'VIII F');
        })
        ->get();
        return view('kelas.viii.f', compact('viiif','search'));
    }

    public function pdf_viiif()
    {
        $viiif = PeminjamanTahunan::where('kelas', 'VIII F')->get();
        $pdf = Pdf::loadView('kelas.viii.pdf_f', ['viiif' => $viiif]);
        return $pdf->stream('data-perpustakaan-VIII-F.pdf');
    }
    // ====================================================================================================
    // Untuk isi Kelas VIII G ==============================================================================
    public function kelas_viiig(Request $request)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();   

        $viiig = PeminjamanTahunan::where('kelas', 'VIII G')->orderBy('name', 'ASC')->paginate(35);

        return view('kelas.viii.g', compact('viiig', 'profile'));
    }

    public function search_viiig(Request $request)
    {
        $search = $request->search;
        $viiig = PeminjamanTahunan::where(function($query) use ($search){
            $query->where('name','like',"%$search%")->where('kelas', 'VIII G');
        })
        ->orWhereHas('bukus', function($query) use($search){
            $query->where('kodebuku', 'like', "%$search%")->where('kelas', 'VIII G');
        })
        ->get();
        return view('kelas.viii.g', compact('viiig','search'));
    }

    public function pdf_viiig()
    {
        $viiig = PeminjamanTahunan::where('kelas', 'VIII G')->get();
        $pdf = Pdf::loadView('kelas.viii.pdf_g', ['viiig' => $viiig]);
        return $pdf->stream('data-perpustakaan-VIII-G.pdf');
    }
    // ====================================================================================================
    // Untuk isi Kelas IX A ==============================================================================
    public function kelas_ixa(Request $request)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();   

        $ixa = PeminjamanTahunan::where('kelas', 'IX A')->orderBy('name', 'ASC')->paginate(35);

        return view('kelas.ix.a', compact('ixa', 'profile'));
    }

    public function search_ixa(Request $request)
    {
        $search = $request->search;
        $ixa = PeminjamanTahunan::where(function($query) use ($search){
            $query->where('name','like',"%$search%")->where('kelas', 'IX A');
        })
        ->orWhereHas('bukus', function($query) use($search){
            $query->where('kodebuku', 'like', "%$search%")->where('kelas', 'IX A');
        })
        ->get();
        return view('kelas.ix.a', compact('ixa','search'));
    }

    public function pdf_ixa()
    {
        $ixa = PeminjamanTahunan::where('kelas', 'IX A')->get();
        $pdf = Pdf::loadView('kelas.ix.pdf_a', ['ixa' => $ixa]);
        return $pdf->stream('data-perpustakaan-IX-A.pdf');
    }
    // ====================================================================================================
    // Untuk isi Kelas IX B ==============================================================================
    public function kelas_ixb(Request $request)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();   

        $ixb = PeminjamanTahunan::where('kelas', 'IX B')->orderBy('name', 'ASC')->paginate(35);

        return view('kelas.ix.b', compact('ixb', 'profile'));
    }

    public function search_ixb(Request $request)
    {
        $search = $request->search;
        $ixb = PeminjamanTahunan::where(function($query) use ($search){
            $query->where('name','like',"%$search%")->where('kelas', 'IX B');
        })
        ->orWhereHas('bukus', function($query) use($search){
            $query->where('kodebuku', 'like', "%$search%")->where('kelas', 'IX B');
        })
        ->get();
        return view('kelas.ix.b', compact('ixb','search'));
    }

    public function pdf_ixb()
    {
        $ixb = PeminjamanTahunan::where('kelas', 'IX B')->get();
        $pdf = Pdf::loadView('kelas.ix.pdf_b', ['ixb' => $ixb]);
        return $pdf->stream('data-perpustakaan-IX-B.pdf');
    }
    // ====================================================================================================
    // Untuk isi Kelas IX C ==============================================================================
    public function kelas_ixc(Request $request)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();   

        $ixc = PeminjamanTahunan::where('kelas', 'IX C')->orderBy('name', 'ASC')->paginate(35);

        return view('kelas.ix.c', compact('ixc', 'profile'));
    }

    public function search_ixc(Request $request)
    {
        $search = $request->search;
        $ixc = PeminjamanTahunan::where(function($query) use ($search){
            $query->where('name','like',"%$search%")->where('kelas', 'IX C');
        })
        ->orWhereHas('bukus', function($query) use($search){
            $query->where('kodebuku', 'like', "%$search%")->where('kelas', 'IX C');
        })
        ->get();
        return view('kelas.ix.c', compact('ixc','search'));
    }

    public function pdf_ixc()
    {
        $ixc = PeminjamanTahunan::where('kelas', 'IX C')->get();
        $pdf = Pdf::loadView('kelas.ix.pdf_c', ['ixc' => $ixc]);
        return $pdf->stream('data-perpustakaan-IX-C.pdf');
    }
    // ====================================================================================================
    // Untuk isi Kelas IX D ==============================================================================
    public function kelas_ixd(Request $request)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();   

        $ixd = PeminjamanTahunan::where('kelas', 'IX D')->orderBy('name', 'ASC')->paginate(35);

        return view('kelas.ix.d', compact('ixd', 'profile'));
    }

    public function search_ixd(Request $request)
    {
        $search = $request->search;
        $ixd = PeminjamanTahunan::where(function($query) use ($search){
            $query->where('name','like',"%$search%")->where('kelas', 'IX D');
        })
        ->orWhereHas('bukus', function($query) use($search){
            $query->where('kodebuku', 'like', "%$search%")->where('kelas', 'IX D');
        })
        ->get();
        return view('kelas.ix.d', compact('ixd','search'));
    }

    public function pdf_ixd()
    {
        $ixd = PeminjamanTahunan::where('kelas', 'IX D')->get();
        $pdf = Pdf::loadView('kelas.ix.pdf_d', ['ixd' => $ixd]);
        return $pdf->stream('data-perpustakaan-IX-D.pdf');
    }
    // ====================================================================================================
    // Untuk isi Kelas IX E ==============================================================================
    public function kelas_ixe(Request $request)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();   

        $ixe = PeminjamanTahunan::where('kelas', 'IX E')->orderBy('name', 'ASC')->paginate(35);

        return view('kelas.ix.e', compact('ixe', 'profile'));
    }

    public function search_ixe(Request $request)
    {
        $search = $request->search;
        $ixe = PeminjamanTahunan::where(function($query) use ($search){
            $query->where('name','like',"%$search%")->where('kelas', 'IX E');
        })
        ->orWhereHas('bukus', function($query) use($search){
            $query->where('kodebuku', 'like', "%$search%")->where('kelas', 'IX E');
        })
        ->get();
        return view('kelas.ix.e', compact('ixe','search'));
    }

    public function pdf_ixe()
    {
        $ixe = PeminjamanTahunan::where('kelas', 'IX E')->get();
        $pdf = Pdf::loadView('kelas.ix.pdf_e', ['ixe' => $ixe]);
        return $pdf->stream('data-perpustakaan-IX-E.pdf');
    }
    // ====================================================================================================
    // Untuk isi Kelas IX F ==============================================================================
    public function kelas_ixf(Request $request)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();   

        $ixf = PeminjamanTahunan::where('kelas', 'IX F')->orderBy('name', 'ASC')->paginate(35);

        return view('kelas.ix.f', compact('ixf', 'profile'));
    }

    public function search_ixf(Request $request)
    {
        $search = $request->search;
        $ixf = PeminjamanTahunan::where(function($query) use ($search){
            $query->where('name','like',"%$search%")->where('kelas', 'IX F');
        })
        ->orWhereHas('bukus', function($query) use($search){
            $query->where('kodebuku', 'like', "%$search%")->where('kelas', 'IX F');
        })
        ->get();
        return view('kelas.ix.f', compact('ixf','search'));
    }

    public function pdf_ixf()
    {
        $ixf = PeminjamanTahunan::where('kelas', 'IX F')->get();
        $pdf = Pdf::loadView('kelas.ix.pdf_f', ['ixf' => $ixf]);
        return $pdf->stream('data-perpustakaan-IX-F.pdf');
    }
    // ====================================================================================================
    // Untuk isi Kelas IX G ==============================================================================
    public function kelas_ixg(Request $request)
    {
        $iduser = Auth::id();
        $profile = User::where('id',$iduser)->first();   

        $ixg = PeminjamanTahunan::where('kelas', 'IX G')->orderBy('name', 'ASC')->paginate(35);

        return view('kelas.ix.g', compact('ixg', 'profile'));
    }

    public function search_ixg(Request $request)
    {
        $search = $request->search;
        $ixg = PeminjamanTahunan::where(function($query) use ($search){
            $query->where('name','like',"%$search%")->where('kelas', 'IX G');
        })
        ->orWhereHas('bukus', function($query) use($search){
            $query->where('kodebuku', 'like', "%$search%")->where('kelas', 'IX G');
        })
        ->get();
        return view('kelas.ix.g', compact('ixg','search'));
    }

    public function pdf_ixg()
    {
        $ixg = PeminjamanTahunan::where('kelas', 'IX G')->get();
        $pdf = Pdf::loadView('kelas.ix.pdf_g', ['ixg' => $ixg]);
        return $pdf->stream('data-perpustakaan-IX-G.pdf');
    }
    // ====================================================================================================
}

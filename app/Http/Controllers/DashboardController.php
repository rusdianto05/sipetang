<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Surat;
use Illuminate\Http\Request;
use App\Models\KeteranganBedaNama;
use App\Http\Controllers\KeteranganKtp;
use App\Models\KetDomisiliUsahaLokal;
use App\Models\KetDomisiliUsahaLuar;
use App\Models\KetJalan;
use App\Models\KetJamKesos;
use App\Models\KetKtp;
use App\Models\KetLahir;
use App\Models\KetMati;
use App\Models\KetNikah;
use App\Models\KetPengantar;
use App\Models\KetPindah;
use App\Models\KetRujukCerai;
use App\Models\KetSktm;
use App\Models\KetUsaha;
use App\Models\KetWali;
use App\Models\MohonAkta;
use App\Models\MohonCerai;
use App\Models\MohonKk;
use App\Models\MohonNikah;
use App\Models\MohonRubahKk;
use App\Models\Office;
use App\Models\Perijinan;

class DashboardController extends Controller
{
    public function index()
    {
        // hitung total surat yang telah acc
        $bedanama = KeteranganBedaNama::where('status', 'approved')->count();
        $usahalokal = KetDomisiliUsahaLokal::where('status', 'approved')->count();
        $usahaluar = KetDomisiliUsahaLuar::where('status', 'approved')->count();
        $jamkesos = KetJamKesos::where('status', 'approved')->count();
        $ktp = KetKtp::where('status', 'approved')->count();
        $lahir = KetLahir::where('status', 'approved')->count();
        $mati = KetMati::where('status', 'approved')->count();
        $nikah = KetNikah::where('status', 'approved')->count();
        $pengantar = KetPengantar::where('status', 'approved')->count();
        $pindah = KetPindah::where('status', 'approved')->count();
        $rujukcerai = KetRujukCerai::where('status', 'approved')->count();
        $sktm = KetSktm::where('status', 'approved')->count();
        $usaha = KetUsaha::where('status', 'approved')->count();
        $wali = KetWali::where('status', 'approved')->count();
        $jalan = KetJalan::where('status', 'approved')->count();
        $akta = MohonAkta::where('status', 'approved')->count();
        $cerai = MohonCerai::where('status', 'approved')->count();
        $kk = MohonKk::where('status', 'approved')->count();
        $nikah = MohonNikah::where('status', 'approved')->count();
        $rubahkk = MohonRubahKk::where('status', 'approved')->count();
        $perijinan = Perijinan::where('status', 'approved')->count();
        $totalacc = $bedanama + $usahalokal + $usahaluar + $jamkesos + $ktp + $lahir + $mati + $nikah + $pengantar + $pindah + $rujukcerai + $sktm + $usaha + $wali + $jalan + $akta + $cerai + $kk + $nikah + $rubahkk + $perijinan;

        // hitung total surat yang belum acc
        $bedanama = KeteranganBedaNama::where('status', 'rejected')->count();
        $usahalokal = KetDomisiliUsahaLokal::where('status', 'rejected')->count();
        $usahaluar = KetDomisiliUsahaLuar::where('status', 'rejected')->count();
        $jamkesos = KetJamKesos::where('status', 'rejected')->count();
        $ktp = KetKtp::where('status', 'rejected')->count();
        $lahir = KetLahir::where('status', 'rejected')->count();
        $mati = KetMati::where('status', 'rejected')->count();
        $nikah = KetNikah::where('status', 'rejected')->count();
        $pengantar = KetPengantar::where('status', 'rejected')->count();
        $pindah = KetPindah::where('status', 'rejected')->count();
        $rujukcerai = KetRujukCerai::where('status', 'rejected')->count();
        $sktm = KetSktm::where('status', 'rejected')->count();
        $usaha = KetUsaha::where('status', 'rejected')->count();
        $wali = KetWali::where('status', 'rejected')->count();
        $jalan = KetJalan::where('status', 'rejected')->count();
        $akta = MohonAkta::where('status', 'rejected')->count();
        $cerai = MohonCerai::where('status', 'rejected')->count();
        $kk = MohonKk::where('status', 'rejected')->count();
        $nikah = MohonNikah::where('status', 'rejected')->count();
        $rubahkk = MohonRubahKk::where('status', 'rejected')->count();
        $perijinan = Perijinan::where('status', 'rejected')->count();
        $totalreject = $bedanama + $usahalokal + $usahaluar + $jamkesos + $ktp + $lahir + $mati + $nikah + $pengantar + $pindah + $rujukcerai + $sktm + $usaha + $wali + $jalan + $akta + $cerai + $kk + $nikah + $rubahkk + $perijinan;
        // hitung total surat pending
        $bedanama = KeteranganBedaNama::where('status', 'pending')->count();
        $usahalokal = KetDomisiliUsahaLokal::where('status', 'pending')->count();
        $usahaluar = KetDomisiliUsahaLuar::where('status', 'pending')->count();
        $jamkesos = KetJamKesos::where('status', 'pending')->count();
        $ktp = KetKtp::where('status', 'pending')->count();
        $lahir = KetLahir::where('status', 'pending')->count();
        $mati = KetMati::where('status', 'pending')->count();
        $nikah = KetNikah::where('status', 'pending')->count();
        $pengantar = KetPengantar::where('status', 'pending')->count();
        $pindah = KetPindah::where('status', 'pending')->count();
        $rujukcerai = KetRujukCerai::where('status', 'pending')->count();
        $sktm = KetSktm::where('status', 'pending')->count();
        $usaha = KetUsaha::where('status', 'pending')->count();
        $wali = KetWali::where('status', 'pending')->count();
        $jalan = KetJalan::where('status', 'pending')->count();
        $akta = MohonAkta::where('status', 'pending')->count();
        $cerai = MohonCerai::where('status', 'pending')->count();
        $kk = MohonKk::where('status', 'pending')->count();
        $nikah = MohonNikah::where('status', 'pending')->count();
        $rubahkk = MohonRubahKk::where('status', 'pending')->count();
        $perijinan = Perijinan::where('status', 'pending')->count();
        $totalpending = $bedanama + $usahalokal + $usahaluar + $jamkesos + $ktp + $lahir + $mati + $nikah + $pengantar + $pindah + $rujukcerai + $sktm + $usaha + $wali + $jalan + $akta + $cerai + $kk + $nikah + $rubahkk + $perijinan;
        // total user where has roles user
        $totaluser = User::role('user')->count();
        $users = User::role('user')->orderby('created_at', 'desc')->paginate(5);
        return view('home', compact('totaluser', 'totalacc', 'totalreject', 'totalpending', 'users'));
    }

    public function cetak()
    {
        $user = User::role('user')->orderby('created_at', 'desc')->get();
        $kantor = Office::first();
        return view('cetakuser', compact('user', 'kantor'));
    }
}

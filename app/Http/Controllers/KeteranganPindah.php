<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Office;
use App\Models\KetPindah;
use Illuminate\Http\Request;
use App\Models\KetPindahPenduduk;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class KeteranganPindah extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = KetPindah::query()->with(['user', 'surat', 'penduduk']);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
    
                    <a href="/keterangan/pindah/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/pindah/delete/' . $item->id . '"  class="btn btn-danger mb-2">
                    Hapus
                    </a>
                    &nbsp;
                    <a href="/keterangan/pindah/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.pindah.index');
    }

    public function show()
    {
        if (request()->ajax()) {
            $query = KetPindah::query()->with(['user', 'surat', 'penduduk'])->where('user_id', auth()->user()->id);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
    
                    <a href="/keterangan/pindah/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    
                    <a href="/keterangan/pindah/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.pindah.index');
    }

    public function create()
    {
        $user = User::all();
        return view('pages.keterangan.pindah.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'surat_id' => 'required',
            'status' => 'required',
            'alamat_pindah' => 'required',
            'alasan_pindah' => 'required',
            'jumlah_pengikut' => 'required',
            'tanggal_pindah' => 'required',
        ]);
        $data = $request->all();
        $pindah = KetPindah::create($request->all());

        foreach ($data['name_id'] as $key => $value) {
            $pindahpenduduk = new KetPindahPenduduk;
            $pindahpenduduk->pindah_id = $pindah->id;
            $pindahpenduduk->name_id = $value;
            $pindahpenduduk->save();
        }

        foreach ($data['ktp_expired'] as $key => $value) {
            $pindahpenduduk->ktp_expired = $value;
            $pindahpenduduk->save();
        }

        foreach ($data['shdk'] as $key => $value) {
            $pindahpenduduk->shdk = $value;
            $pindahpenduduk->save();
        }
        return redirect()->route('pindah.index')->with('success');
    }

    public function edit($id)
    {
        $user = User::all();
        $item = KetPindah::findOrFail($id);
        $penduduk = KetPindahPenduduk::where('pindah_id', $id)->get();
        return view('pages.keterangan.pindah.edit', compact('item', 'user', 'penduduk'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'user_id' => 'required',
            'alamat_pindah' => 'required',
            'alasan_pindah' => 'required',
            'jumlah_pengikut' => 'required',
            'tanggal_pindah' => 'required',
        ]);
        $data = $request->all();
        $item = KetPindah::findOrFail($id);
        $item->update($request->all());
        foreach ($data['name_ids'] as $key => $value) {
            $pindahpenduduk = KetPindahPenduduk::find($key);
            $pindahpenduduk->name_id = $value;
            $pindahpenduduk->pindah_id = $item->id;
            $pindahpenduduk->save();
        }

        foreach ($data['ktp_expireds'] as $key => $value) {
            $pindahpenduduk = KetPindahPenduduk::find($key);
            $pindahpenduduk->ktp_expired = $value;
            $pindahpenduduk->save();
        }

        foreach ($data['shdks'] as $key => $value) {
            $pindahpenduduk = KetPindahPenduduk::find($key);
            $pindahpenduduk->shdk = $value;
            $pindahpenduduk->save();
        }

        if (isset($data['name_id'])) {
            foreach ($data['name_id'] as $key => $value) {
                $pindahpenduduk = new KetPindahPenduduk;
                $pindahpenduduk->pindah_id = $item->id;
                $pindahpenduduk->name_id = $value;
                $pindahpenduduk->save();
            }

            foreach ($data['ktp_expired'] as $key => $value) {
                $pindahpenduduk->ktp_expired = $value;
                $pindahpenduduk->save();
            }

            foreach ($data['shdk'] as $key => $value) {
                $pindahpenduduk->shdk = $value;
                $pindahpenduduk->save();
            }
        }

        if (Auth::user()->hasrole('admin'))
            return redirect()->route('pindah.index')->with('success');
        else
            return redirect()->route('pindah.show')->with('success');
    }

    public function destroy($id)
    {
        $item = KetPindah::findOrFail($id);
        $item->delete();
        return redirect()->route('pindah.index');
    }

    public function cetak($id)
    {
        $item = KetPindah::findOrFail($id);
        $kantor = Office::first();
        $date = new \DateTime($item->user->date_of_birth);
        $now = new \DateTime();
        $interval = $now->diff($date);
        $umur = $interval->y;
        $pindahpenduduk = KetPindahPenduduk::where('pindah_id', $item->id)->get();
        return view('pages.keterangan.pindah.cetak', compact('item', 'kantor', 'umur', 'pindahpenduduk'));
    }
}

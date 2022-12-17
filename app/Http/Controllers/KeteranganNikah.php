<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Surat;
use App\Models\Office;
use App\Models\KetNikah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class KeteranganNikah extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = KetNikah::query()->with('user', 'pasangan', 'wali', 'pasangan_dulu', 'surat', 'ayah', 'ibu', 'ayah_pasangan', 'ibu_pasangan');

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
    
                    <a href="/keterangan/nikah/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/nikah/delete/' . $item->id . '"  class="btn btn-danger mb-2">
                    Hapus
                    </a>
                    &nbsp;
                    <a href="/keterangan/nikah/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.nikah.index');
    }

    public function show()
    {
        if (request()->ajax()) {
            $query = KetNikah::query()->with('user', 'pasangan', 'wali', 'pasangan_dulu', 'surat', 'ayah', 'ibu', 'ayah_pasangan', 'ibu_pasangan')->where('user_id', auth()->user()->id);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <a href="/keterangan/nikah/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/nikah/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.nikah.index');
    }
    public function create()
    {
        $user = User::all();
        return view('pages.keterangan.nikah.create', compact('user'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'user_id' => 'required',
            'ayah_id' => 'required',
            'ibu_id' => 'required',
            'pasangan_id' => 'required',
            'ayah_pasangan_id' => 'required',
            'ibu_pasangan_id' => 'required',
            'wali_id' => 'required',
            'place' => 'required',
            'mas_kawin' => 'required',
            'time' => 'required',
            'surat_id' => 'required',
            'status' => 'required',
        ]);
        KetNikah::create($request->all());
        return redirect()->route('nikah.index');
    }

    public function edit($id)
    {
        $user = User::all();
        $item = KetNikah::findOrFail($id);
        return view('pages.keterangan.nikah.edit', compact('item', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'ayah_id' => 'required',
            'ibu_id' => 'required',
            'pasangan_id' => 'required',
            'ayah_pasangan_id' => 'required',
            'ibu_pasangan_id' => 'required',
            'wali_id' => 'required',
            'place' => 'required',
            'mas_kawin' => 'required',
            'time' => 'required',
            'surat_id' => 'required',
        ]);
        $item = KetNikah::findOrFail($id);
        $item->update($request->all());
        if (Auth::user()->hasrole('admin')) {
            return redirect()->route('nikah.index');
        } else {
            return redirect()->route('nikah.show');
        }
    }

    public function destroy($id)
    {
        $item = KetNikah::findOrFail($id);
        $item->delete();
        return redirect()->route('nikah.index');
    }

    public function cetak($id)
    {
        $item = KetNikah::findOrFail($id);
        $kantor = Office::first();
        return view('pages.keterangan.nikah.cetak', compact('item', 'kantor'));
    }
}

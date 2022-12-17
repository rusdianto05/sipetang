<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Office;
use Illuminate\Http\Request;
use App\Models\KetDomisiliUsahaLuar;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DomisiliUsahaLuar extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = KetDomisiliUsahaLuar::query()->with('user', 'surat');

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '

                    <a href="/keterangan/usaha-luar/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/usaha-luar/delete/' . $item->id . '"  class="btn btn-danger mb-2">
                    Hapus
                    </a>
                    &nbsp;
                    <a href="/keterangan/usaha-luar/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.domisili_usaha_luar.index');
    }

    public function show()
    {
        if (request()->ajax()) {
            $query = KetDomisiliUsahaLuar::query()->with('user', 'surat')->where('user_id', auth()->user()->id);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '

                    <a href="/keterangan/usaha-luar/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/usaha-luar/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.domisili_usaha_luar.index');
    }

    public function create()
    {
        $user = User::all();
        return view('pages.keterangan.domisili_usaha_luar.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'surat_id' => 'required',
            'jenis_identitas' => 'required',
            'no_identitas' => 'required',
            'name' => 'required',
            'jenis' => 'required',
            'register_id' => 'required',
            'bangunan' => 'required',
            'tujuan' => 'required',
            'status_bangunan' => 'required',
            'address' => 'required',
            'status' => 'required',
        ]);

        KetDomisiliUsahaLuar::create($request->all());
        return redirect()->route('usaha-luar.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $user = User::all();
        $item = KetDomisiliUsahaLuar::findOrFail($id);
        return view('pages.keterangan.domisili_usaha_luar.edit', compact('item', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'surat_id' => 'required',
            'jenis_identitas' => 'required',
            'no_identitas' => 'required',
            'name' => 'required',
            'jenis' => 'required',
            'register_id' => 'required',
            'bangunan' => 'required',
            'tujuan' => 'required',
            'status_bangunan' => 'required',
            'address' => 'required',
        ]);

        $item = KetDomisiliUsahaLuar::findOrFail($id);
        $item->update($request->all());
        if (Auth::user()->hasrole('admin'))
            return redirect()->route('usaha-luar.index')->with('success', 'Data Berhasil Diubah');
        else
            return redirect()->route('usaha-luar.show')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $item = KetDomisiliUsahaLuar::findOrFail($id);
        $item->delete();
        return redirect()->route('usaha-luar.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function cetak($id)
    {
        $item = KetDomisiliUsahaLuar::findOrFail($id);
        $kantor = Office::first();
        return view('pages.keterangan.domisili_usaha_luar.cetak', compact('item', 'kantor'));
    }
}

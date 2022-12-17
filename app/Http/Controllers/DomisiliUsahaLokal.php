<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\KetDomisiliUsahaLokal;
use Yajra\DataTables\Facades\DataTables;

class DomisiliUsahaLokal extends Controller
{
    public function index(Request $request)
    {

        if (request()->ajax()) {
            $query = KetDomisiliUsahaLokal::query()->with('user', 'surat');

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '

                    <a href="/keterangan/usaha-lokal/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/usaha-lokal/delete/' . $item->id . '"  class="btn btn-danger mb-2">
                    Hapus
                    </a>
                    &nbsp;
                    <a href="/keterangan/usaha-lokal/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.domisili_usaha_lokal.index');
    }

    public function show()
    {
        if (request()->ajax()) {
            $query = KetDomisiliUsahaLokal::query()->with('user', 'surat')->where('user_id', auth()->user()->id);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '

                    <a href="/keterangan/usaha-lokal/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/usaha-lokal/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.domisili_usaha_lokal.index');
    }
    public function create()
    {
        $user = User::all();
        return view('pages.keterangan.domisili_usaha_lokal.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'surat_id' => 'required',
            'name' => 'required',
            'jenis' => 'required',
            'alamat' => 'required',
            'status' => 'required',
        ]);

        KetDomisiliUsahaLokal::create($request->all());
        return redirect()->route('usaha-lokal.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $user = User::all();
        $item = KetDomisiliUsahaLokal::findOrFail($id);
        return view('pages.keterangan.domisili_usaha_lokal.edit', compact('item', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'surat_id' => 'required',
            'name' => 'required',
            'jenis' => 'required',
            'alamat' => 'required',
        ]);

        $item = KetDomisiliUsahaLokal::findOrFail($id);
        $item->update($request->all());
        if (Auth::user()->hasrole('admin'))
            return redirect()->route('usaha-lokal.index')->with('success', 'Data Berhasil Diubah');
        else
            return redirect()->route('usaha-lokal.show')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $item = KetDomisiliUsahaLokal::findOrFail($id);
        $item->delete();
        return redirect()->route('usaha-lokal.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function cetak($id)
    {
        $item = KetDomisiliUsahaLokal::findOrFail($id);
        $kantor = Office::first();
        return view('pages.keterangan.domisili_usaha_lokal.cetak', compact('item', 'kantor'));
    }
}

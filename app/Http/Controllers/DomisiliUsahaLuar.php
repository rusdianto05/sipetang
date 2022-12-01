<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\KetDomisiliUsahaLuar;
use Yajra\DataTables\Facades\DataTables;

class DomisiliUsahaLuar extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = KetDomisiliUsahaLuar::query();

            return DataTables::of($query)
                ->addColumn('nama', function ($data) {
                    return $data->user->name;
                })
                ->addColumn('action', function ($item) {
                    return '

                    <a href="/keterangan/usaha-luar/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/usaha-luar/delete/' . $item->id . '"  class="btn btn-danger mb-2">
                    Hapus
                    </a>
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
            'status' => 'required',
        ]);

        $item = KetDomisiliUsahaLuar::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('usaha-luar.index')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $item = KetDomisiliUsahaLuar::findOrFail($id);
        $item->delete();
        return redirect()->route('usaha-luar.index')->with('success', 'Data Berhasil Dihapus');
    }
}

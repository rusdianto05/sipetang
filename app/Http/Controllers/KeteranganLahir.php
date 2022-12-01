<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\KetLahir;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KeteranganLahir extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = KetLahir::query();

            return DataTables::of($query)
                ->addColumn('ayah', function ($data) {
                    return $data->user->name;
                });
            return DataTables::of($query)
                ->addColumn('pelapor', function ($data) {
                    return $data->pelapor->name;
                });
            return DataTables::of($query)
                ->addColumn('ibu', function ($data) {
                    return $data->ibu->name;
                })
                ->addColumn('action', function ($item) {
                    return '
    
                    <a href="/keterangan/lahir/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/lahir/delete/' . $item->id . '"  class="btn btn-danger mb-2">
                    Hapus
                    </a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.lahir.index');
    }

    public function create()
    {
        $user = User::all();
        return view('pages.keterangan.lahir.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'surat_id' => 'required',
            'ayah_id' => 'required',
            'ibu_id' => 'required',
            'nama_anak' => 'required',
            'gender' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'status' => 'required',
        ]);
        KetLahir::create($request->all());
        return redirect()->route('lahir.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $user = User::all();
        $item = KetLahir::findOrFail($id);
        return view('pages.keterangan.lahir.edit', compact('item', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'surat_id' => 'required',
            'ayah_id' => 'required',
            'ibu_id' => 'required',
            'nama_anak' => 'required',
            'gender' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'status' => 'required',
        ]);
        $item = KetLahir::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('lahir.index')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $item = KetLahir::findOrFail($id);
        $item->delete();
        return redirect()->route('lahir.index')->with('success', 'Data Berhasil Dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\KetJamKesos;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KeteranganJamkesos extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = KetJamKesos::query();

            return DataTables::of($query)
                ->addColumn('nama', function ($data) {
                    return $data->user->name;
                })
                ->addColumn('action', function ($item) {
                    return '
    
                    <a href="/keterangan/jamkesos/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/jamkesos/delete/' . $item->id . '"  class="btn btn-danger mb-2">
                    Hapus
                    </a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.jamkesos.index');
    }

    public function create()
    {
        $user = User::all();
        return view('pages.keterangan.jamkesos.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'surat_id' => 'required',
            'jamkesos_id' => 'required',
            'keperluan' => 'required',
            'status' => 'required',
        ]);
        KetJamKesos::create($request->all());
        return redirect()->route('jamkesos.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $user = User::all();
        $item = KetJamKesos::findOrFail($id);
        return view('pages.keterangan.jamkesos.edit', compact('item', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'surat_id' => 'required',
            'jamkesos_id' => 'required',
            'keperluan' => 'required',
            'status' => 'required',
        ]);
        $item = KetJamKesos::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('jamkesos.index')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $item = KetJamKesos::findOrFail($id);
        $item->delete();
        return redirect()->route('jamkesos.index')->with('success', 'Data Berhasil Dihapus');
    }
}

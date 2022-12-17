<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Office;
use App\Models\KetJamKesos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                    &nbsp;
                    <a href="/keterangan/jamkesos/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.jamkesos.index');
    }

    public function show()
    {
        if (request()->ajax()) {
            $query = KetJamKesos::query()->where('user_id', auth()->user()->id);

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
                    <a href="/keterangan/jamkesos/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
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
        ]);
        $item = KetJamKesos::findOrFail($id);
        $item->update($request->all());
        if (Auth::user()->hasrole('admin'))
            return redirect()->route('jamkesos.index')->with('success', 'Data Berhasil Diubah');
        else
            return redirect()->route('jamkesos.show')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $item = KetJamKesos::findOrFail($id);
        $item->delete();
        return redirect()->route('jamkesos.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function cetak($id)
    {
        $item = KetJamKesos::findOrFail($id);
        $kantor = Office::first();
        return view('pages.keterangan.jamkesos.cetak', compact('item', 'kantor'));
    }
}

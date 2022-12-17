<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\KetKtp;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class KeteranganKtp extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = KetKtp::query();

            return DataTables::of($query)
                ->addColumn('nama', function ($data) {
                    return $data->user->name;
                })
                ->addColumn('action', function ($item) {
                    return '
    
                    <a href="/keterangan/ktp/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/ktp/delete/' . $item->id . '"  class="btn btn-danger mb-2">
                    Hapus
                    </a>
                    &nbsp;
                    <a href="/keterangan/ktp/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.ktp.index');
    }

    public function show()
    {
        if (request()->ajax()) {
            $query = KetKtp::query()->where('user_id', auth()->user()->id);

            return DataTables::of($query)
                ->addColumn('nama', function ($data) {
                    return $data->user->name;
                })
                ->addColumn('action', function ($item) {
                    return '
    
                    <a href="/keterangan/ktp/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/ktp/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.ktp.index');
    }

    public function create()
    {
        $user = User::all();
        return view('pages.keterangan.ktp.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'surat_id' => 'required',
            'status' => 'required',
        ]);
        KetKtp::create($request->all());
        return redirect()->route('ktp.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $user = User::all();
        $item = KetKtp::findOrFail($id);
        return view('pages.keterangan.ktp.edit', compact('item', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'surat_id' => 'required',
        ]);
        $item = KetKtp::findOrFail($id);
        $item->update($request->all());
        if (Auth::user()->hasrole('user'))
            return redirect()->route('ktp.show')->with('success', 'Data Berhasil Diubah');
        else
            return redirect()->route('ktp.index')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $item = KetKtp::findOrFail($id);
        $item->delete();
        return redirect()->route('ktp.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function cetak($id)
    {
        $item = KetKtp::findOrFail($id);
        $kantor = Office::first();
        return view('pages.keterangan.ktp.cetak', compact('item', 'kantor'));
    }
}

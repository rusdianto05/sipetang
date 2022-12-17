<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Office;
use App\Models\KetLahir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class KeteranganLahir extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = KetLahir::query()->with(['user', 'surat', 'pelapor']);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
    
                    <a href="/keterangan/lahir/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/lahir/delete/' . $item->id . '"  class="btn btn-danger mb-2">
                    Hapus
                    </a>
                    &nbsp;
                    <a href="/keterangan/lahir/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.lahir.index');
    }

    public function show()
    {
        if (request()->ajax()) {
            $query = KetLahir::query()->with(['user', 'surat', 'pelapor'])->where('user_id', auth()->user()->id);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
    
                    <a href="/keterangan/lahir/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/lahir/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
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
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
        ]);
        $item = KetLahir::findOrFail($id);
        $item->update($request->all());
        if (Auth::user()->hasrole('admin'))
            return redirect()->route('lahir.index')->with('success', 'Data Berhasil Diubah');
        else
            return redirect()->route('lahir.show')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $item = KetLahir::findOrFail($id);
        $item->delete();
        return redirect()->route('lahir.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function cetak($id)
    {
        $item = KetLahir::findOrFail($id);
        $kantor = Office::first();
        return view('pages.keterangan.lahir.cetak', compact('item', 'kantor'));
    }
}

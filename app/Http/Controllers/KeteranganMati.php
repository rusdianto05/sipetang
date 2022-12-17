<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Office;
use App\Models\KetMati;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class KeteranganMati extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = KetMati::query()->with('user', 'pelapor');

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
    
                    <a href="/keterangan/mati/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/mati/delete/' . $item->id . '"  class="btn btn-danger mb-2">
                    Hapus
                    </a>
                    &nbsp;
                    <a href="/keterangan/mati/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.mati.index');
    }

    public function show()
    {
        if (request()->ajax()) {
            $query = KetMati::query()->with('user', 'pelapor')->where('user_id', auth()->user()->id);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
    
                    <a href="/keterangan/mati/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/mati/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.mati.index');
    }

    public function create()
    {
        $user = User::all();
        return view('pages.keterangan.mati.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'surat_id' => 'required',
            'pelapor_id' => 'required',
            'pelapor_hubungan' => 'required',
            'place' => 'required',
            'waktu' => 'required',
        ]);
        KetMati::create($request->all());
        return redirect()->route('mati.index');
    }

    public function edit($id)
    {
        $user = User::all();
        $item = KetMati::findOrFail($id);
        return view('pages.keterangan.mati.edit', compact('item', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'surat_id' => 'required',
            'pelapor_id' => 'required',
            'pelapor_hubungan' => 'required',
            'place' => 'required',
            'waktu' => 'required',
        ]);
        $item = KetMati::findOrFail($id);
        $item->update($request->all());
        if (Auth::user()->hasrole('admin'))
            return redirect()->route('mati.index');
        else
            return redirect()->route('mati.show');
    }

    public function destroy($id)
    {
        $item = KetMati::findOrFail($id);
        $item->delete();
        return redirect()->route('mati.index');
    }

    public function cetak($id)
    {
        $item = KetMati::findOrFail($id);
        $kantor = Office::first();
        return view('pages.keterangan.mati.cetak', compact('item', 'kantor'));
    }
}

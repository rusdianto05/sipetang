<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Office;
use App\Models\KetPengantar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class KeteranganPengantar extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = KetPengantar::query()->with('user');

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
    
                    <a href="/keterangan/pengantar/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/pengantar/delete/' . $item->id . '"  class="btn btn-danger mb-2">
                    Hapus
                    </a>
                    &nbsp;
                    <a href="/keterangan/pengantar/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.pengantar.index');
    }

    public function show()
    {
        if (request()->ajax()) {
            $query = KetPengantar::query()->with('user')->where('user_id', auth()->user()->id);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <a href="/keterangan/pengantar/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/pengantar/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.pengantar.index');
    }

    public function create()
    {
        $user = User::all();
        return view('pages.keterangan.pengantar.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'surat_id' => 'required',
            'kepala_keluarga' => 'required',
            'keperluan' => 'required',
            'status' => 'required',
            'valid_from' => 'required',
            'valid_until' => 'required',
        ]);
        KetPengantar::create($request->all());
        return redirect()->route('pengantar.index');
    }

    public function edit($id)
    {
        $user = User::all();
        $item = KetPengantar::findOrFail($id);
        return view('pages.keterangan.pengantar.edit', compact('item', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'surat_id' => 'required',
            'kepala_keluarga' => 'required',
            'keperluan' => 'required',
            'status' => 'required',
            'valid_from' => 'required',
            'valid_until' => 'required',
        ]);
        $item = KetPengantar::findOrFail($id);
        $item->update($request->all());
        if (Auth::user()->hasrole('admin'))
            return redirect()->route('pengantar.index');
        else
            return redirect()->route('pengantar.show');
    }

    public function destroy($id)
    {
        $item = KetPengantar::findOrFail($id);
        $item->delete();
        return redirect()->route('pengantar.index');
    }

    public function cetak($id)
    {
        $item = KetPengantar::findOrFail($id);
        // count umur from date of birth
        $date = new \DateTime($item->user->date_of_birth);
        $now = new \DateTime();
        $interval = $now->diff($date);
        $umur = $interval->y;
        $kantor = Office::first();
        return view('pages.keterangan.pengantar.cetak', compact('item', 'kantor', 'umur'));
    }
}

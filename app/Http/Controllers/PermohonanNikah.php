<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Office;
use App\Models\MohonNikah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PermohonanNikah extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = MohonNikah::query()->with(['user', 'surat']);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '

                    <a href="/permohonan/nikah/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/permohonan/nikah/delete/' . $item->id . '"  class="btn btn-danger mb-2">
                    Hapus
                    </a>
                    &nbsp;
                    <a href="/permohonan/nikah/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.permohonan.nikah.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('pages.permohonan.nikah.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id',
            'surat_id',
            'kepala_keluarga',
            'tgl_nikah',
            'nama_pasangan',
            'status',
        ]);

        MohonNikah::create($request->all());
        return redirect()->route('mohon-nikah.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        if (request()->ajax()) {
            $query = MohonNikah::query()->with(['user', 'surat'])->where('user_id', auth()->user()->id);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '

                    <a href="/permohonan/nikah/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/permohonan/nikah/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.permohonan.nikah.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::all();
        $item = MohonNikah::find($id);
        return view('pages.permohonan.nikah.edit', compact('user', 'item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id',
            'surat_id',
            'kepala_keluarga',
            'tgl_nikah',
            'nama_pasangan',
        ]);

        $nikah = MohonNikah::find($id);
        $nikah->update($request->all());
        if (Auth::user()->hasrole('admin'))
            return redirect()->route('mohon-nikah.index')->with('success', 'Data Berhasil Diedit');
        else
            return redirect()->route('mohon-nikah.show')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nikah = MohonNikah::find($id);
        $nikah->delete();
        return redirect()->route('mohon-nikah.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function cetak($id)
    {
        $item = MohonNikah::find($id);
        $kantor = Office::first();
        return view('pages.permohonan.nikah.cetak', compact('item', 'kantor'));
    }
}

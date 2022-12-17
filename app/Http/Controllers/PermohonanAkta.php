<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Office;
use App\Models\MohonAkta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PermohonanAkta extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = MohonAkta::query()->with(['user', 'ayah', 'ibu', 'surat']);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '

                    <a href="/permohonan/akta/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/permohonan/akta/delete/' . $item->id . '"  class="btn btn-danger mb-2">
                    Hapus
                    </a>
                    &nbsp;
                    <a href="/permohonan/akta/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.permohonan.akta.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('pages.permohonan.akta.create', compact('user'));
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
            'user_id' => 'required',
            'ayah_id' => 'required',
            'ibu_id' => 'required',
            'hari_lahir' => 'required',
            'surat_id' => 'required',
            'status' => 'required',
        ]);

        MohonAkta::create($request->all());
        return redirect()->route('akta.index')->with('success', 'Data Berhasil Ditambahkan');
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
            $query = MohonAkta::query()->with(['user', 'ayah', 'ibu', 'surat'])->where('user_id', auth()->user()->id);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '

                    <a href="/permohonan/akta/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/permohonan/akta/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.permohonan.akta.index');
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
        $item = MohonAkta::find($id);
        return view('pages.permohonan.akta.edit', compact('user', 'item'));
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
            'user_id' => 'required',
            'ayah_id' => 'required',
            'ibu_id' => 'required',
            'hari_lahir' => 'required',
            'surat_id' => 'required',
        ]);

        $akta = MohonAkta::find($id);
        $akta->update($request->all());
        if (Auth::user()->hasrole('admin'))
            return redirect()->route('akta.index')->with('success', 'Data Berhasil Diedit');
        else
            return redirect()->route('akta.show')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $akta = MohonAkta::find($id);
        $akta->delete();
        return redirect()->route('akta.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function cetak($id)
    {
        $item = MohonAkta::find($id);
        $kantor = Office::first();
        return view('pages.permohonan.akta.cetak', compact('item', 'kantor'));
    }
}

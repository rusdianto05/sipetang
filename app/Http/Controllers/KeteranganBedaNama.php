<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\KeteranganBedaNama as KeteranganBedaNamaModel;
use App\Models\Office;
use Illuminate\Support\Facades\Auth;

class KeteranganBedaNama extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $query = KeteranganBedaNamaModel::query()->with(['user', 'surat']);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '

                    <a href="/keterangan/beda-nama/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/beda-nama/delete/' . $item->id . '"  class="btn btn-danger mb-2">
                    Hapus
                    </a>
                    &nbsp;
                    <a href="/keterangan/beda-nama/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.beda_nama.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('pages.keterangan.beda_nama.create', compact('user'));
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
            'new_name' => 'required',
            'perbedaan' => 'required',
        ]);

        KeteranganBedaNamaModel::create($request->all());
        return redirect()->route('beda-nama.index')->with('message', 'Data Berhasil Ditambahkan');
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
            $query = KeteranganBedaNamaModel::query()->with(['user', 'surat'])->where('user_id', auth()->user()->id);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <a href="/keterangan/beda-nama/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/beda-nama/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.beda_nama.index');
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
        $bedanama = KeteranganBedaNamaModel::find($id);
        return view('pages.keterangan.beda_nama.edit', compact('user', 'bedanama'));
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
            'new_name' => 'required',
            'perbedaan' => 'required',
        ]);

        $bedanama = KeteranganBedaNamaModel::find($id);
        $bedanama->update($request->all());
        if (Auth::user()->hasrole('admin'))
            return redirect()->route('beda-nama.index')->with('message', 'Data Berhasil Diedit');
        else
            return redirect()->route('beda-nama.show')->with('message', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bedanama = KeteranganBedaNamaModel::find($id);
        $bedanama->delete();
        return redirect()->route('beda-nama.index')->with('message', 'Data Berhasil Dihapus');
    }

    public function cetak($id)
    {
        $kantor = Office::first();
        $bedanama = KeteranganBedaNamaModel::find($id);
        return view('pages.keterangan.beda_nama.cetak', compact('bedanama', 'kantor'));
    }
}

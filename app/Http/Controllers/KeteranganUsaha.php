<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Office;
use App\Models\KetUsaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\KetDomisiliUsahaLokal;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\DomisiliUsahaLokal;

class KeteranganUsaha extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = KetUsaha::query()->with(['user', 'domisili_usaha_lokal']);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '

                    <a href="/keterangan/usaha/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/usaha/delete/' . $item->id . '"  class="btn btn-danger mb-2">
                    Hapus
                    </a>
                    &nbsp;
                    <a href="/keterangan/usaha/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.usaha.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $usaha = KetDomisiliUsahaLokal::all();
        return view('pages.keterangan.usaha.create', compact('user', 'usaha'));
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
            'domisili_usaha_lokal_id' => 'required',
            'keterangan' => 'required',
            'valid_from' => 'required',
            'valid_until' => 'required',
            'status' => 'required',
        ]);

        KetUsaha::create($request->all());
        return redirect()->route('usaha.index')->with('success', 'Data Berhasil Ditambahkan');
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
            $query = KetUsaha::query()->with(['user', 'domisili_usaha_lokal'])->where('user_id', auth()->user()->id);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '

                    <a href="/keterangan/usaha/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/usaha/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.usaha.index');
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
        $item = KetUsaha::find($id);
        $usaha = KetDomisiliUsahaLokal::all();
        return view('pages.keterangan.usaha.edit', compact('user', 'item', 'usaha'));
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
            'domisili_usaha_lokal_id' => 'required',
            'keterangan' => 'required',
            'valid_from' => 'required',
            'valid_until' => 'required',
        ]);

        $usaha = KetUsaha::find($id);
        $usaha->update($request->all());
        if (Auth::user()->hasrole('admin'))
            return redirect()->route('usaha.index')->with('success', 'Data Berhasil Diedit');
        else
            return redirect()->route('usaha.show')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usaha = KetUsaha::find($id);
        $usaha->delete();
        return redirect()->route('usaha.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function cetak($id)
    {
        $item = KetUsaha::find($id);
        $kantor = Office::first();
        return view('pages.keterangan.usaha.cetak', compact('item', 'kantor'));
    }
}

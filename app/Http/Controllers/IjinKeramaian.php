<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Office;
use App\Models\Perijinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class IjinKeramaian extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = Perijinan::query()->with(['user', 'surat']);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '

                    <a href="/perijinan/keramaian/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/perijinan/keramaian/delete/' . $item->id . '"  class="btn btn-danger mb-2">
                    Hapus
                    </a>
                    &nbsp;
                    <a href="/perijinan/keramaian/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.perijinan.keramaian.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('pages.perijinan.keramaian.create', compact('user'));
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
            'surat_id' => 'required',
            'kepala_keluarga' => 'required',
            'tujuan' => 'required',
            'status' => 'required',
            'place' => 'required',
            'valid_until' => 'required',
            'valid_from' => 'required',
            'time' => 'required'

        ]);

        Perijinan::create($request->all());
        return redirect()->route('keramaian.index')->with('success', 'Data Berhasil Ditambahkan');
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
            $query = Perijinan::query()->with(['user', 'surat'])->where('user_id', auth()->user()->id);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '

                    <a href="/perijinan/keramaian/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/perijinan/keramaian/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.perijinan.keramaian.index');
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
        $item = Perijinan::find($id);
        return view('pages.perijinan.keramaian.edit', compact('user', 'item'));
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
            'surat_id' => 'required',
            'kepala_keluarga' => 'required',
            'tujuan' => 'required',
            'place' => 'required',
            'valid_until' => 'required',
            'valid_from' => 'required',
            'time' => 'required'
        ]);

        $keramaian = Perijinan::find($id);
        $keramaian->update($request->all());
        if (Auth::user()->hasrole('admin'))
            return redirect()->route('keramaian.index')->with('success', 'Data Berhasil Diedit');
        else
            return redirect()->route('keramaian.show')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keramaian = Perijinan::find($id);
        $keramaian->delete();
        return redirect()->route('keramaian.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function cetak($id)
    {
        $item = Perijinan::find($id);
        $kantor = Office::first();
        return view('pages.perijinan.keramaian.cetak', compact('item', 'kantor'));
    }
}

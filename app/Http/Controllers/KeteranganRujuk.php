<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Office;
use Illuminate\Http\Request;
use App\Models\KetRujukCerai;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class KeteranganRujuk extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = KetRujukCerai::query()->with(['user', 'ayah', 'pasangan', 'pasanganayah'])->where('type', 'rujuk');

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '

                    <a href="/keterangan/rujuk/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/rujuk/delete/' . $item->id . '"  class="btn btn-danger mb-2">
                    Hapus
                    </a>
                    &nbsp;
                    <a href="/keterangan/rujuk/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.rujuk.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('pages.keterangan.rujuk.create', compact('user'));
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
            'ayah_id' => 'required',
            'pasangan_id' => 'required',
            'pasangan_ayah_id' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
        ]);

        KetRujukCerai::create($request->all());
        return redirect()->route('rujuk.index')->with('success', 'Data Berhasil Ditambahkan');
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
            $query = KetRujukCerai::query()->with(['user', 'ayah', 'pasangan', 'pasanganayah'])->where('type', 'rujuk')->where('user_id', auth()->user()->id);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '

                    <a href="/keterangan/rujuk/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/rujuk/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.rujuk.index');
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
        $item = KetRujukCerai::find($id);
        return view('pages.keterangan.rujuk.edit', compact('user', 'item'));
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
            'ayah_id' => 'required',
            'pasangan_id' => 'required',
            'pasangan_ayah_id' => 'required',
            'keterangan' => 'required',
        ]);

        $rujuk = KetRujukCerai::find($id);
        $rujuk->update($request->all());
        if (Auth::user()->hasrole('admin'))
            return redirect()->route('rujuk.index')->with('success', 'Data Berhasil Diedit');
        else
            return redirect()->route('rujuk.show')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rujuk = KetRujukCerai::find($id);
        $rujuk->delete();
        return redirect()->route('rujuk.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function cetak($id)
    {
        $item = KetRujukCerai::find($id);
        $kantor = Office::first();
        return view('pages.keterangan.rujuk.cetak', compact('item', 'kantor'));
    }
}

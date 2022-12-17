<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Office;
use App\Models\KetSktm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class KeteranganSktm extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = KetSktm::query()->with(['user', 'anak']);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '

                    <a href="/keterangan/sktm/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/sktm/delete/' . $item->id . '"  class="btn btn-danger mb-2">
                    Hapus
                    </a>
                    &nbsp;
                    <a href="/keterangan/sktm/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.sktm.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('pages.keterangan.sktm.create', compact('user'));
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
            'anak_id' => 'required',
            'tujuan' => 'required',
            'status' => 'required',
        ]);

        KetSktm::create($request->all());
        return redirect()->route('sktm.index')->with('success', 'Data Berhasil Ditambahkan');
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
            $query = KetSktm::query()->with(['user', 'anak'])->where('user_id', auth()->user()->id);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '

                    <a href="/keterangan/sktm/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/keterangan/sktm/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.keterangan.sktm.index');
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
        $item = KetSktm::find($id);
        return view('pages.keterangan.sktm.edit', compact('user', 'item'));
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
            'anak_id' => 'required',
            'tujuan' => 'required',
        ]);

        $sktm = KetSktm::find($id);
        $sktm->update($request->all());
        if (Auth::user()->hasrole('admin'))
            return redirect()->route('sktm.index')->with('success', 'Data Berhasil Diedit');
        else
            return redirect()->route('sktm.show')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sktm = KetSktm::find($id);
        $sktm->delete();
        return redirect()->route('sktm.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function cetak($id)
    {
        $item = KetSktm::find($id);
        $kantor = Office::first();
        return view('pages.keterangan.sktm.cetak', compact('item', 'kantor'));
    }
}

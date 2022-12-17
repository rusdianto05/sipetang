<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Office;
use App\Models\MohonCerai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PermohonanCerai extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = MohonCerai::query()->with(['suami', 'istri', 'surat']);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '

                    <a href="/permohonan/cerai/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/permohonan/cerai/delete/' . $item->id . '"  class="btn btn-danger mb-2">
                    Hapus
                    </a>
                    &nbsp;
                    <a href="/permohonan/cerai/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.permohonan.cerai.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('pages.permohonan.cerai.create', compact('user'));
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
            'suami_id' => 'required',
            'istri_id' => 'required',
            'surat_id' => 'required',
            'sebab' => 'required',
            'status' => 'required',
        ]);

        MohonCerai::create($request->all());
        return redirect()->route('mohon-cerai.index')->with('success', 'Data Berhasil Ditambahkan');
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
            $query = MohonCerai::query()->with(['suami', 'istri', 'surat'])->where('suami_id', auth()->user()->id);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '

                    <a href="/permohonan/cerai/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/permohonan/cerai/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.permohonan.cerai.index');
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
        $item = MohonCerai::find($id);
        return view('pages.permohonan.cerai.edit', compact('user', 'item'));
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
            'suami_id' => 'required',
            'istri_id' => 'required',
            'surat_id' => 'required',
            'sebab' => 'required',
        ]);

        $cerai = MohonCerai::find($id);
        $cerai->update($request->all());
        if (Auth::user()->hasrole('admin'))
            return redirect()->route('mohon-cerai.index')->with('success', 'Data Berhasil Diedit');
        else
            return redirect()->route('mohon-cerai.show')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cerai = MohonCerai::find($id);
        $cerai->delete();
        return redirect()->route('mohon-cerai.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function cetak($id)
    {
        $item = MohonCerai::find($id);
        $kantor = Office::first();
        return view('pages.permohonan.cerai.cetak', compact('item', 'kantor'));
    }
}

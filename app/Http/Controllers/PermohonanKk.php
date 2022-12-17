<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MohonKk;
use App\Models\Office;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PermohonanKk extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = MohonKk::query()->with(['user', 'surat']);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '

                    <a href="/permohonan/kk/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/permohonan/kk/delete/' . $item->id . '"  class="btn btn-danger mb-2">
                    Hapus
                    </a>
                    &nbsp;
                    <a href="/permohonan/kk/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.permohonan.kk.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('pages.permohonan.kk.create', compact('user'));
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
            'type' => 'required',
            'status' => 'required',
        ]);

        MohonKk::create($request->all());
        return redirect()->route('kk.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $item = MohonKk::find($id);
        return view('pages.permohonan.kk.edit', compact('user', 'item'));
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
            'type' => 'required',
            'status' => 'required',
        ]);

        $kk = MohonKk::find($id);
        $kk->update($request->all());
        return redirect()->route('kk.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kk = MohonKk::find($id);
        $kk->delete();
        return redirect()->route('kk.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function cetak($id)
    {
        $item = MohonKk::find($id);

        $date = new \DateTime($item->user->date_of_birth);
        $now = new \DateTime();
        $interval = $now->diff($date);
        $umur = $interval->y;
        $kantor = Office::first();
        return view('pages.permohonan.kk.cetak', compact('item', 'kantor', 'umur'));
    }
}

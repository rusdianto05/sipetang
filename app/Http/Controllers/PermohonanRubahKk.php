<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Office;
use App\Models\MohonRubahKk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PermohonanRubahKk extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = MohonRubahKk::query()->with(['user', 'surat']);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '

                    <a href="/permohonan/rubah-kk/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/permohonan/rubah-kk/delete/' . $item->id . '"  class="btn btn-danger mb-2">
                    Hapus
                    </a>
                    &nbsp;
                    <a href="/permohonan/rubah-kk/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.permohonan.rubah-kk.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('pages.permohonan.rubah-kk.create', compact('user'));
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
            'status' => 'required',
        ]);

        MohonRubahKk::create($request->all());
        return redirect()->route('rubah-kk.index')->with('success', 'Data Berhasil Ditambahkan');
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
            $query = MohonRubahKk::query()->with(['user', 'surat'])->where('user_id', Auth::user()->id);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '

                    <a href="/permohonan/rubah-kk/' . $item->id . '/edit"  class="btn btn-primary mb-2">
                        Edit
                    </a>
                    &nbsp;
                    <a href="/permohonan/rubah-kk/cetak/' . $item->id . '" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.permohonan.rubah-kk.index');
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
        $item = MohonRubahKk::find($id);
        return view('pages.permohonan.rubah-kk.edit', compact('user', 'item'));
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
        ]);

        $kk = MohonRubahKk::find($id);
        $kk->update($request->all());
        if (Auth::user()->hasrole('admin'))
            return redirect()->route('rubah-kk.index')->with('success', 'Data Berhasil Diedit');
        else
            return redirect()->route('rubah-kk.show')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kk = MohonRubahKk::find($id);
        $kk->delete();
        return redirect()->route('rubah-kk.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function cetak($id)
    {
        $item = MohonRubahKk::find($id);
        $kantor = Office::first();
        $date = new \DateTime($item->user->date_of_birth);
        $now = new \DateTime();
        $interval = $now->diff($date);
        $umur = $interval->y;
        return view('pages.permohonan.rubah-kk.cetak', compact('item', 'kantor', 'umur'));
    }
}

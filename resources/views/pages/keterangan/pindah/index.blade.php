@extends('layouts.app')
@section('title', 'Keterangan Pindah')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Surat Keterangan Pindah</h4>
        @role('admin')
        <a href="{{ url('keterangan/pindah/create') }}" class="card-description">
         Tambah Data
        </a>
        @endrole
        {{-- end check role --}}
        <div class="table-responsive pt-3">
          <table id="crudTable" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>
                  No
                </th>
                <th>
                  Nama
                </th>
                <th>
                  Alamat Pindah
                </th>
                <th>Alasan</th>
                <th>Tanggal Pindah</th>
                <th>Jumlah Pengikut</th>
                <th>Status</th>
                <th>
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody>
             
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endsection
  @section('custom-script')
  <script>
    var DataTable = $('#crudTable').DataTable( {
        ajax: {
            url: '{!! url()->current() !!}'
        },
        columns: [
            { data: 'id', name: 'id', width: '5%'},
            { data: 'user.name', name: 'user.name'},
            { data: 'alamat_pindah', name: 'alamat_pindah'},
            { data: 'alasan_pindah', name: 'alasan_pindah'},
            { data: 'tanggal_pindah', name: 'tanggal_pindah'},
            { data: 'jumlah_pengikut', name: 'jumlah_pengikut'},
            { data: 'status', name: 'status'},
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,
                width: '15%'
            }
        ]
    })
</script>
@endsection

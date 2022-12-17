@extends('layouts.app')
@section('title', 'Perijinan Keramaian')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Surat Perijinan Keramaian</h4>
        @role('admin')
        <a href="{{ url('perijinan/keramaian/create') }}" class="card-description">
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
                  Kepala Keluarga
                </th>
                <th>Tujuan</th>
                <th>Tempat</th>
                <th>Waktu</th>
                <th>Berlaku Mulai</th>
                <th>Berlaku Sampai</th>
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
            { data: 'kepala_keluarga', name: 'kepala_keluarga'},
            { data: 'tujuan', name: 'tujuan'},
            { data: 'place', name: 'place'},
            { data: 'time', name: 'time'},
            { data: 'valid_from', name: 'valid_from'},
            { data: 'valid_until', name: 'valid_until'},
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

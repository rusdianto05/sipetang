@extends('layouts.app')
@section('title', 'Keterangan Nikah')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Surat Keterangan Nikah</h4>
        @role('admin')
        <a href="{{ url('keterangan/nikah/create') }}" class="card-description">
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
                <th>Nama Pasangan</th>
                <th>Nama Wali</th>
                <th>Nama Pasangan Dulu</th>
                <th>
                  Tempat
                </th>
                <th>Mas Kawin</th>
                <th>Waktu</th>
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
            { data: 'pasangan.name', name: 'pasangan.name'},
            { data: 'wali.name', name: 'wali.name'},
            { data: 'pasangan_dulu.name', name: 'pasangan_dulu.name'},
            { data: 'place', name: 'place'},
            { data: 'mas_kawin', name: 'mas_kawin'},
            { data: 'time', name: 'time'},
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

@extends('layouts.app')
@section('title', 'Keterangan lahir')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Surat Keterangan lahir</h4>
        @role('admin')
        <a href="{{ url('keterangan/lahir/create') }}" class="card-description">
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
                <th>Nama Ibu</th>
                <th>Kondisi</th>
                <th>Lama Kandungan</th>
                <th>Nama Pelapor</th>
                <th>Hubungan Pelapor</th>
                <th>Tanggal Lahir</th>
                <th>Tempat Lahir</th>
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
  @section('custom-script')
  <script>
    var DataTable = $('#crudTable').DataTable( {
        ajax: {
            url: '{!! url()->current() !!}'
        },
        columns: [
            { data: 'id', name: 'id', width: '5%'},
            { data: 'user.name', name: 'user.name', width: '10%'},
            { data: 'kondisi', name: 'kondisi', width: '10%'},
            { data: 'lama_kandungan', name: 'lama_kandungan', width: '10%'},
            { data: 'pelapor.name', name: 'pelapor.name', width: '10%'},
            { data: 'pelapor_hubungan', name: 'hubungan_pelapor', width: '10%'},
            { data: 'tanggal_lahir', name: 'tanggal_lahir', width: '10%'},
            { data: 'tempat_lahir', name: 'tempat_lahir', width: '10%'},
            { data: 'status', name: 'status', width: '10%'},
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
@endsection
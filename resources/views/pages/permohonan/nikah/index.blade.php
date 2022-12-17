@extends('layouts.app')
@section('title', 'Permohonan Duplikat Buku Nikah')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Surat Permohonan Duplikat Buku Nikah</h4>
        @role('admin')
        <a href="{{ url('permohonan/nikah/create') }}" class="card-description">
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
                <th>Kepala Keluarga</th>
                <th>
                  Tanggal Nikah
                </th>
                <th>Nama Pasangan</th>
                <th>Jenis Surat</th>
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
            { data: 'tgl_nikah', name: 'tgl_nikah'},
            { data: 'nama_pasangan', name: 'nama_pasangan'},
            { data: 'surat.name', name: 'surat.name'},
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

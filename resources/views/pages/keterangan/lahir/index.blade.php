@extends('layouts.app')
@section('title', 'Keterangan lahir')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Surat Keterangan lahir</h4>
        <a href="{{ url('keterangan/lahir/create') }}" class="card-description">
         Tambah Data
        </a>
        <div class="table-responsive pt-3">
          <table id="crudTable" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>
                  No
                </th>
                <th>Nama Anak</th>
                <th>
                  Nama Ayah
                </th>
                <th>Nama Ibu</th>
                <th>Jenis Kelamin</th>
                <th>Kondisi</th>
                <th>Lama Kandungan</th>
                <th>Nama Pelapor</th>
                <th>Hubungan Pelapor</th>
                <th>Tanggal Lahir</th>
                <th>Tempat Lahir</th>
                <th></th>
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
            { data: 'nama_anak', name: 'nama_anak', width: '10%'},
            { data: 'ayah', name: 'nama_ayah', width: '10%'},
            { data: 'ibu', name: 'nama_ibu', width: '10%'},
            { data: 'jenis_kelamin', name: 'jenis_kelamin', width: '10%'},
            { data: 'kondisi', name: 'kondisi', width: '10%'},
            { data: 'lama_kandungan', name: 'lama_kandungan', width: '10%'},
            { data: 'pelapor', name: 'nama_pelapor', width: '10%'},
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
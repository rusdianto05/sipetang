@extends('layouts.app')
@section('title', 'Keterangan Domisili Usaha luar')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Surat Keterangan Domisili Usaha luar</h4>
        <a href="{{ url('/keterangan/usaha-luar/create') }}" class="card-description">
         Tambah Data
        </a>
        <div class="table-responsive pt-3">
          <table id="usahaLuar" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>
                  No
                </th>
                <th>
                  Nama
                </th>
                <th>
                  Nama Usaha 
                </th>
                <th>No Identitas</th>
                <th>jenis_identitas</th>
                <th>
                  Jenis Usaha
                </th>
                <th>no registrasi</th>
                <th>Bangunan</th>
                <th>Tujuan</th>
                <th>Status Bangunan</th>
                <th>
                  Alamat Usaha
                </th>
                <th>
                  Status
                </th>
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
    var DataTable = $('#usahaLuar').DataTable( {
        ajax: {
            url: '{!! url()->current() !!}'
        },
        columns: [
            { data: 'id', name: 'id', width: '5%'},
            { data: 'nama', name: 'nama'},
            { data: 'name', name: 'nama usaha'},
            { data: 'no_identitas', name: 'No Identitas'},
            { data: 'jenis_identitas', name: 'jenis_identitas'},
            { data: 'jenis', name: 'jenis usaha'},
            { data: 'register_id', name: 'no registrasi'},
            { data: 'bangunan', name: 'bangunan'},
            { data: 'tujuan', name: 'tujuan'},
            { data: 'status_bangunan', name: 'Status Bangunan'},
            { data: 'address', name: 'alamat usaha'},
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
@endsection
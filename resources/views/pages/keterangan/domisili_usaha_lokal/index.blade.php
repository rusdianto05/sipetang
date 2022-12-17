@extends('layouts.app')
@section('title', 'Keterangan Domisili Usaha Lokal')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Surat Keterangan Domisili Usaha Lokal</h4>
        @role('admin')
        <a href="{{ url('/keterangan/usaha-lokal/create') }}" class="card-description">
         Tambah Data
        </a>
        @endrole
        {{-- end check role --}}
        <div class="table-responsive pt-3">
          <table id="usahaLokal" class="table table-bordered table-hover">
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
                <th>
                  Jenis Usaha
                </th>
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
    var DataTable = $('#usahaLokal').DataTable( {
        ajax: {
            url: '{!! url()->current() !!}'
        },
        columns: [
            { data: 'id', name: 'id', width: '5%'},
            { data: 'user.name', name: 'user.name'},
            { data: 'name', name: 'nama usaha'},
            { data: 'jenis', name: 'jenis usaha'},
            { data: 'alamat', name: 'alamat usaha'},
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
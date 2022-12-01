@extends('layouts.app')
@section('title', 'Keterangan ktp')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Surat Keterangan ktp</h4>
        <a href="{{ url('keterangan/ktp/create') }}" class="card-description">
         Tambah Data
        </a>
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
            { data: 'nama', name: 'nama'},
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
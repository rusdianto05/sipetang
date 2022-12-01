@extends('layouts.app')
@section('title', 'Keterangan Beda Nama')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Surat Keterangan Beda Nama</h4>
        <a href="{{ url('keterangan/beda-nama/create') }}" class="card-description">
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
                  Nama Lama
                </th>
                <th>
                  Nama Baru 
                </th>
                <th>
                  Perbedaan
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
    var DataTable = $('#crudTable').DataTable( {
        ajax: {
            url: '{!! url()->current() !!}'
        },
        columns: [
            { data: 'id', name: 'id', width: '5%'},
            { data: 'nama', name: 'nama'},
            { data: 'new_name', name: 'new_name'},
            { data: 'perbedaan', name: 'perbedaan'},
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,
                width: '20%'
            }
        ]
    })
</script>
@endsection
@endsection
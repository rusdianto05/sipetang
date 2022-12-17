@extends('layouts.app')
@section('title', 'Permohonan Cerai')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Surat Permohonan Cerai</h4>
        @role('admin')
        <a href="{{ url('permohonan/cerai/create') }}" class="card-description">
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
                <th>Nama Suami</th>
                <th>Nama Istri</th>
                <th>Sebab</th>
                <th>
                  Jenis Surat
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
  @endsection
  @section('custom-script')
  <script>
    var DataTable = $('#crudTable').DataTable( {
        ajax: {
            url: '{!! url()->current() !!}'
        },
        columns: [
            { data: 'id', name: 'id', width: '5%'},
            { data: 'suami.name', name: 'suami.name'},
            { data: 'istri.name', name: 'istri.name'},
            { data: 'sebab', name: 'sebab'},
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

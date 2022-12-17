@extends('layouts.app')
@section('title', 'Keterangan Pindah')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Surat Keterangan Pindah</h4>
        <p class="card-description">
          Edit form dibawah ini
        </p>
        <form class="forms-sample" method="POST" action="{{ url('/keterangan/pindah/'.$item->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <div class="form-group">
            <label for="name">Nama</label>
            <select class="form-control" id="user_id" name="user_id">
              <option>Silahkan Pilih Data</option>
              @forelse ($user as $person)
              <option value="{{ $person->id }}" {{$item->user_id == $person->id ? 'selected' : ''  }}>{{ $person->person_id . '-' . $person->name . '-' . $person->date_of_birth }}</option>
              @empty
                  
              @endforelse
            </select>
          </div>
    
          <div class="form-group">
            <label for="alamat_pindah">Alamat Pindah</label>
            <input type="text" class="form-control" id="alamat_pindah" name="alamat_pindah" value="{{ $item->alamat_pindah }}" placeholder="alamat_pindah">
          </div>
          
          <div class="form-group">
            <label for="alasan_pindah">Alasan Pindah</label>
            <input type="text" class="form-control" id="alasan_pindah" name="alasan_pindah" value="{{ $item->alasan_pindah }}" placeholder="alasan pindah">
          </div>

          <div class="form-group">
            <label for="tanggal_pindah">Tanggal Pindah</label>
            <input type="date" class="form-control" id="tanggal_pindah" name="tanggal_pindah" value="{{ $item->tanggal_pindah }}">
          </div>
          <div class="form-group">
            <label for="jumlah_pengikut">Jumlah Pengikut</label>
            <input type="number" class="form-control" id="jumlah_pengikut" name="jumlah_pengikut" value="{{ $item->jumlah_pengikut }}">
          </div>
          <div class="form-group">
            <label for="name_id"><b>Daftar Anggota Keluarga</b></label>
            @foreach ($penduduk as $keluarga)
            <select class="form-control mb-2" id="name_id" name="{{ ('name_ids['.$keluarga->id.']') }}">
              @forelse ($user as $item)
              <option value="{{ $item->id }}" {{ $keluarga->name_id == $item->id ? 'selected' : '' }}>{{ $item->person_id . '-' . $item->name . '-' . $item->date_of_birth }}</option>
              @empty
                  
              @endforelse
            </select>
            <label for="ktp_expired">Masa Berlaku KTP</label>
            <input type="date" class="form-control mb-2" id="ktp_expired" name="{{ ('ktp_expireds['.$keluarga->id.']') }}" value="{{ $keluarga->ktp_expired }}">
            <label for="shdk">SHDK(Status Hubungan)</label>
            <input type="text" class="form-control mb-2" id="shdk" name="{{ ('shdks['.$keluarga->id.']') }}" value="{{ $keluarga->shdk }}">
            @endforeach
            <button type="button" class="form-control" id="addNamaRow">
              Tambah Nama +
            </button>
          </div>
          <div id="newNamaRow"></div>
          @role('admin')
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
              <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>Pending</option>
              <option value="approved" {{ $item->status == 'approved' ? 'selected' : '' }}>Diterima</option>
              <option value="rejected" {{ $item->status == 'rejected' ? 'selected' : '' }}>Ditolak</option>
            </select>
          </div>
          @endrole
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <button type="reset" class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
@endsection
@section('custom-script')
<script type="text/javascript">
  // add row
  $("#addNamaRow").click(function() {
      var html = '';
      html += '<div class="form-group">';
      html += '<div id="inputFormNamaRow">';
      // html += '<div class="input-group mb-2">';
      html += '<select class="form-control mb-2" id="name_id" name="name_id[]">';
      html += '<option>Silahkan Pilih Data</option>';
      html += '@forelse ($user as $item)';
      html += '<option value="{{ $item->id }}" >{{ $item->person_id . '-' . $item->name . '-' . $item->date_of_birth }}</option>';
      html += '@empty';
      html += '@endforelse';
      html += '</select>';
     
      html +=  '<label for="ktp_expired">Masa Berlaku KTP</label>';
      html +=  '<input type="date" class="form-control mb-2" id="ktp_expired" name="ktp_expired[]">';
      html +=  '<label for="shdk">SHDK(Status Hubungan)</label>';
      html +=  '<input type="text" class="form-control mb-2" id="shdk" name="shdk[]" placeholder="Status Hubungan">';
      html += '<div class="input-group-append">';
        html += '<button id="removeNamaRow" type="button" class="btn btn-danger">Hapus</button>';
        html +=    '</div>';
      html += '</div>';
      html += '</div>';
      html += '</div>';


      $('#newNamaRow').append(html);
  });

  // remove row
  $(document).on('click', '#removeNamaRow', function() {
      $(this).closest('#inputFormNamaRow').remove();
  });
</script>
@endsection
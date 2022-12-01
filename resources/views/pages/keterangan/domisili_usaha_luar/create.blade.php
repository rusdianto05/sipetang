@extends('layouts.app')
@section('title', 'Keterangan Domisili Usaha Lokal')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Buat Surat Keterangan Domisili Usaha Lokal</h4>
        <p class="card-description">
          Isi form dibawah ini
        </p>
        <form class="forms-sample" method="POST" action="{{ route('usaha-luar.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <select class="form-control" id="user_id" name="user_id">
              <option>Silahkan Pilih Data</option>
              @forelse ($user as $item)
              <option value="{{ $item->id }}" >{{ $item->person_id . '-' . $item->name . '-' . $item->date_of_birth }}</option>
              @empty
                  
              @endforelse
            </select>
          </div>
          <div class="form-group">
            <label for="surat_id">Status</label>
            <select class="form-control" id="surat_id" name="surat_id">
              <option value="1">Keterangan</option>
              <option value="2">Permohonan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="jenis_identitas">Jenis Identitas</label>
            <input type="text" class="form-control" id="jenis_identitas" name="jenis_identitas" required>
          </div>
          <div class="form-group">
            <label for="no_identitas">No Identitas</label>
            <input type="text" class="form-control" id="no_identitas" name="no_identitas" required>
          </div>
          <div class="form-group">
            <label for="name">Nama Usaha</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="form-group">
            <label for="jenis">Jenis Usaha</label>
            <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis Usaha">
          </div>
          <div class="form-group">
            <label for="register_id">Nomor Register</label>
            <input type="text" class="form-control" id="register_id" name="register_id" placeholder="Jenis Usaha">
          </div>
          <div class="form-group">
            <label for="bangunan">Bangunan</label>
            <input type="text" class="form-control" id="bangunan" name="bangunan" placeholder="Jenis Usaha">
          </div>
          <div class="form-group">
            <label for="tujuan">Tujuan</label>
            <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Jenis Usaha">
          </div>
          <div class="form-group">
            <label for="status_bangunan">Status Bangunan</label>
            <input type="text" class="form-control" id="status_bangunan" name="status_bangunan" placeholder="Jenis Usaha">
          </div>
          <div class="form-group">
            <label for="address">Alamat</label>
            <textarea class="form-control" id="address" name="address"></textarea>
          </div>
          <div class="form-group">
            <label for="Status">Status</label>
            <select class="form-control" id="status" name="status">
              <option value="pending">Pending</option>
              <option value="approved">Diterima</option>
              <option value="rejected">Ditolak</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <button type="reset" class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
@endsection
@extends('layouts.app')
@section('title', 'Keterangan Jalan')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Buat Surat Keterangan Jalan</h4>
        <p class="card-description">
          Isi form dibawah ini
        </p>
        <form class="forms-sample" method="POST" action="{{ route('jalan.store') }}" enctype="multipart/form-data">
          @csrf
          @if($errors->any())
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
              @forelse ($user as $item)
              <option value="{{ $item->id }}" >{{ $item->person_id . '-' . $item->name . '-' . $item->date_of_birth }}</option>
              @empty
                  
              @endforelse
            </select>
          </div>
          
          <div class="form-group">
            <label for="surat_id">Surat</label>
            <select class="form-control" id="surat_id" name="surat_id">
              <option value="1">Keterangan</option>
              <option value="2">Permohonan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="kepala_keluarga">Kepala Keluarga</label>
            <input type="text" class="form-control" id="kepala_keluarga" name="kepala_keluarga" placeholder="kepala_keluarga">
          </div>
          <div class="form-group">
            <label for="keperluan">Keperluan</label>
            <input type="text" class="form-control" id="keperluan" name="keperluan" placeholder="keperluan">
          </div>
          <div class="form-group">
            <label for="valid_from">Berlaku Dari</label>
            <input type="date" class="form-control" id="valid_from" name="valid_from">
          </div>
          <div class="form-group">
            <label for="valid_until">Berlaku Sampai</label>
            <input type="date" class="form-control" id="valid_until" name="valid_until">
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
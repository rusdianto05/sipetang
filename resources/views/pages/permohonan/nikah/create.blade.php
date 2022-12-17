@extends('layouts.app')
@section('title', 'Permohonan Duplikat Buku Nikah')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Buat Surat Permohonan Duplikat Buku Nikah</h4>
        <p class="card-description">
          Isi form dibawah ini
        </p>
        <form class="forms-sample" method="POST" action="{{ route('mohon-nikah.store') }}" enctype="multipart/form-data">
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
            <label for="kepala_keluarga">Kepala Keluarga</label>
            <input type="text" class="form-control" name="kepala_keluarga" placeholder="Nama Kepala Keluarga">
          </div>
          <div class="form-group">
            <label for="tgl_nikah">Tanggal Menikah</label>
            <input type="date" class="form-control" name="tgl_nikah" placeholder="Tanggal Nikah">
          </div>
          <div class="form-group">
            <label for="nama_pasangan">Nama Pasangan</label>
            <input type="text" class="form-control" name="nama_pasangan" placeholder="Nama Pasangan">
          </div>
          <div class="form-group">
            <label for="surat_id">Surat</label>
            <select class="form-control" id="surat_id" name="surat_id">
              <option value="1">Keterangan</option>
              <option value="2">Permohonan</option>
            </select>
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
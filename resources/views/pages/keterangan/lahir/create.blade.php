@extends('layouts.app')
@section('title', 'Keterangan lahir')
@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Buat Surat Keterangan lahir</h4>
        <p class="card-description">
          Isi form dibawah ini
        </p>
        <form class="forms-sample" method="POST" action="{{ route('lahir.store') }}" enctype="multipart/form-data">
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
            <label for="name">Nama Pelapor</label>
            <select class="form-control" id="pelapor_id" name="pelapor_id">
              <option>Silahkan Pilih Data</option>
              @forelse ($user as $item)
              <option value="{{ $item->id }}" >{{ $item->person_id . '-' . $item->name . '-' . $item->date_of_birth }}</option>
              @empty
                  
              @endforelse
            </select>
          </div>
          <div class="form-group">
            <label for="pelapor_hubungan">Hubungan Pelapor</label>
            <input type="text" class="form-control" id="pelapor_hubungan" name="pelapor_hubungan" placeholder="Hubungan Pelapor">
          </div>
          <div class="form-group">
            <label for="surat_id">Surat</label>
            <select class="form-control" id="surat_id" name="surat_id">
              <option value="1">Keterangan</option>
              <option value="2">Permohonan</option>
            </select>
          </div>
         
          <div class="form-group">
            <label for="kondisi">Kondisi</label>
            <select class="form-control" name="kondisi" id="kondisi">
              <option value="hidup">Hidup</option>
              <option value="mati">Mati</option>
            </select>
          </div>
          <div class="form-group">
            <label for="lama_kandungan">Lama Kandungan</label>
            <input type="text" class="form-control" id="lama_kandungan" name="lama_kandungan" placeholder="Lama Kandungan">
          </div>
          <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="datetime-local" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir">
          </div>
          <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
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
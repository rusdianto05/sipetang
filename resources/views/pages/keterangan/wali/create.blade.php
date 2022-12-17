@extends('layouts.app')
@section('title', 'Keterangan Wali')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Buat Surat Keterangan Wali</h4>
        <p class="card-description">
          Isi form dibawah ini
        </p>
        <form class="forms-sample" method="POST" action="{{ route('wali.store') }}" enctype="multipart/form-data">
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
            <label for="regency">Kabupaten</label>
            <input type="text" class="form-control" id="regency" name="regency" placeholder="regency">
          </div>
          <div class="form-group">
            <label for="sub_district">Kecamatan</label>
            <input type="text" class="form-control" id="sub_district" name="sub_district" placeholder="sub_district">
          </div>
          <div class="form-group">
            <label for="village">Desa</label>
            <input type="text" class="form-control" id="village" name="village" placeholder="village">
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
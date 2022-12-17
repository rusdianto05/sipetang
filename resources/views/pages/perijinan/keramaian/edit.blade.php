@extends('layouts.app')
@section('title', 'Keterangan Cerai')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Surat Keterangan Cerai</h4>
        <p class="card-description">
          Edit form dibawah ini
        </p>
        <form class="forms-sample" method="POST" action="{{ url('/perijinan/keramaian/'.$item->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
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
              @forelse ($user as $person)
              <option value="{{ $person->id }}" {{$item->user_id == $person->id ? 'selected' : ''  }}>{{ $person->person_id . '-' . $person->name . '-' . $person->date_of_birth }}</option>
              @empty
                  
              @endforelse
            
            </select>
            @error('user_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
         
          <div class="form-group">
            <label for="surat_id">Surat</label>
            <select class="form-control" id="surat_id" name="surat_id">
              <option value="1" {{$item->surat_id == 1 ? 'selected' : ''  }}>Keterangan</option>
              <option value="2" {{$item->surat_id == 2 ? 'selected' : ''  }}>Permohonan</option>
            </select>
            @error('surat_id')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>
         
          <div class="form-group">
            <label for="kepala_keluarga">Kepala Keluarga</label>
            <input type="text" class="form-control" id="kepala_keluarga" name="kepala_keluarga" value="{{ $item->kepala_keluarga }}" placeholder="Nama Kepala Keluarga">
          </div>
          <div class="form-group">
            <label for="tujuan">Keperluan</label>
            <input type="text" class="form-control" id="tujuan" name="tujuan" value="{{ $item->tujuan }}" placeholder="Keperluan Surat">
          </div>
          <div class="form-group">
            <label for="place">Tempat</label>
            <input type="text" class="form-control" id="place" name="place" value="{{ $item->place }}" placeholder="Tempat Acara">
          </div>

          <div class="form-group">
            <label for="time">Tanggal dan Waktu</label>
            <input type="datetime-local" class="form-control" id="time" value="{{ $item->time }}" name="time" placeholder="Waktu Acara">
          </div>
          <div class="form-group">
            <label for="valid_from">Berlaku Dari</label>
            <input type="date" class="form-control" id="valid_from" value="{{ $item->valid_from }}" name="valid_from" placeholder="Mulai Berlakunya Surat">
          </div>
          <div class="form-group">
            <label for="valid_until">Berlaku Sampai</label>
            <input type="date" class="form-control" id="valid_until" value="{{ $item->valid_until }}" name="valid_until" placeholder="Berakhirnya Surat">
          </div>
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
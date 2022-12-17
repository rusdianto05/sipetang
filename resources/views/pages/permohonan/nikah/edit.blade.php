@extends('layouts.app')
@section('title', 'Permohonan Duplikat Buku Nikah')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Surat Permohonan Duplikat Buku Nikah</h4>
        <p class="card-description">
          Edit form dibawah ini
        </p>
        <form class="forms-sample" method="POST" action="{{ url('/permohonan/nikah/'.$item->id) }}" enctype="multipart/form-data">
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
          </div>
         
          <div class="form-group">
            <label for="kepala_keluarga">Kepala Keluarga</label>
            <input type="text" class="form-control" name="kepala_keluarga" value="{{ $item->kepala_keluarga }}" placeholder="Nama Kepala Keluarga">
          </div>
          <div class="form-group">
            <label for="tgl_nikah">Tanggal Nikah</label>
            <input type="date" class="form-control" name="tgl_nikah" value="{{ $item->tgl_nikah }}">
          </div>
          <div class="form-group">
            <label for="nama_pasangan">Nama Pasangan</label>
            <input type="text" class="form-control" name="nama_pasangan" value="{{ $item->nama_pasangan }}" placeholder="Nama Pasangan">
          </div>
          <div class="form-group">
            <label for="surat_id">Surat</label>
            <select class="form-control" id="surat_id" name="surat_id">
              <option value="1" {{$item->surat_id == 1 ? 'selected' : ''  }}>Keterangan</option>
              <option value="2" {{$item->surat_id == 2 ? 'selected' : ''  }}>Permohonan</option>
            </select>
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
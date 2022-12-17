@extends('layouts.app')
@section('title', 'Keterangan Domisili Usaha')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Surat Keterangan Domisili Usaha</h4>
        <p class="card-description">
          Edit form dibawah ini
        </p>
        <form class="forms-sample" method="POST" action="{{ url('/keterangan/usaha-lokal/'.$item->id) }}" enctype="multipart/form-data">
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
            <label for="name">Name</label>
            <select class="form-control" id="user_id" name="user_id">
              <option>Silahkan Pilih Data</option>
              @forelse ($user as $person)
              <option value="{{ $person->id }}" {{$item->user_id == $person->id ? 'selected' : ''  }}>{{ $person->person_id . '-' . $person->name . '-' . $person->date_of_birth }}</option>
              @empty
                  
              @endforelse
            </select>
          </div>
          <div class="form-group">
            <label for="surat_id">Status</label>
            <select class="form-control" id="surat_id" name="surat_id">
              <option value="1" {{$item->surat_id == 1 ? 'selected' : ''  }}>Keterangan</option>
              <option value="2" {{$item->surat_id == 2 ? 'selected' : ''  }}>Permohonan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="name">Nama Usaha</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" placeholder="Nama Usaha">
          </div>
          <div class="form-group">
            <label for="jenis">Jenis Usaha</label>
            <input type="text" class="form-control" id="jenis" name="jenis" value="{{ $item->jenis }}" placeholder="Jenis Usaha">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat">{{ $item->alamat }}</textarea>
          </div>
          @role('admin')
          <div class="form-group">
            <label for="Status">Status</label>
            <select class="form-control" id="status" name="status">
              <option value="pending" {{$item->status == 'pending' ? 'selected' : ''  }}>Pending</option>
              <option value="approved" {{$item->status == 'approved' ? 'selected' : ''  }}>Diterima</option>
              <option value="rejected" {{$item->status == 'rejected' ? 'selected' : ''  }}>Ditolak</option>
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
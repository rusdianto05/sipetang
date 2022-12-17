@extends('layouts.app')
@section('title', 'Keterangan Usaha')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Surat Keterangan Usaha</h4>
        <p class="card-description">
          Edit form dibawah ini
        </p>
        <form class="forms-sample" method="POST" action="{{ url('/keterangan/usaha/'.$item->id) }}" enctype="multipart/form-data">
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
              {{-- add error validation --}}
            </select>
            @error('user_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="name">Nama Usaha</label>
            <select class="form-control" id="domisili_usaha_lokal_id" name="domisili_usaha_lokal_id">
              <option>Silahkan Pilih Data</option>
              @forelse ($usaha as $person)
              <option value="{{ $person->id }}" {{$item->domisili_usaha_lokal_id == $person->id ? 'selected' : ''  }}>{{ $person->name }}</option>
              @empty
                  
              @endforelse
            </select>
            @error('domisili_usaha_lokal_id')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>
    
          <div class="form-group">
            <label for="keterangan">Keperluan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $item->keterangan }}" placeholder="keterangan">
            @error('keterangan')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>
          <div class="form-group">
            <label for="valid_from">Berlaku Dari</label>
            <input type="date" class="form-control" id="valid_from" name="valid_from" value="{{ $item->valid_from }}" placeholder="Berlaku Dari">
            @error('valid_from')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>

          <div class="form-group">
            <label for="valid_until">Berlaku Sampai</label>
            <input type="date" class="form-control" id="valid_until" name="valid_until" value="{{ $item->valid_until }}" placeholder="Berlaku Sampai">
            @error('valid_until')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>
       @role('admin')
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
              <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>Pending</option>
              <option value="approved" {{ $item->status == 'approved' ? 'selected' : '' }}>Diterima</option>
              <option value="rejected" {{ $item->status == 'rejected' ? 'selected' : '' }}>Ditolak</option>
            </select>
            @error('status')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>
          @endrole
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <button type="reset" class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
@endsection
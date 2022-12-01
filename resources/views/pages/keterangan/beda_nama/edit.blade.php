@extends('layouts.app')
@section('title', 'Keterangan Beda Nama')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Surat Keterangan Beda Nama</h4>
        <p class="card-description">
          Edit form dibawah ini
        </p>
        <form class="forms-sample" method="POST" action="{{ url('/keterangan/beda-nama/'.$bedanama->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="name">Name</label>
            <select class="form-control" id="user_id" name="user_id">
              <option>Silahkan Pilih Data</option>
              @forelse ($user as $item)
              <option value="{{ $item->id }}" {{$bedanama->user_id == $item->id ? 'selected' : ''  }}>{{ $item->person_id . '-' . $item->name . '-' . $item->date_of_birth }}</option>
              @empty
                  
              @endforelse
            </select>
          </div>
          <div class="form-group">
            <label for="new_name">Nama Baru</label>
            <input type="text" class="form-control" value="{{ $bedanama->new_name }}" name="new_name" placeholder="Nama Baru">
          </div>
          <div class="form-group">
            <label for="perbedaan">Perbedaan</label>
            <input type="text" class="form-control" value="{{ $bedanama->perbedaan }}" name="perbedaan" placeholder="Perbedaan nama">
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
              <option value="pending" {{ $bedanama->status == 'pending' ? 'selected' : '' }}>Pending</option>
              <option value="approved" {{ $bedanama->status == 'approved' ? 'selected' : '' }}>Diterima</option>
              <option value="rejected" {{ $bedanama->status == 'rejected' ? 'selected' : '' }}>Ditolak</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <button type="reset" class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
@endsection
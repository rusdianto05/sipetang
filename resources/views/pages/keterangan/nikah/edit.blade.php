@extends('layouts.app')
@section('title', 'Keterangan Nikah')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Surat Keterangan Nikah</h4>
        <p class="card-description">
          Edit form dibawah ini
        </p>
        <form class="forms-sample" method="POST" action="{{ url('/keterangan/nikah/'.$item->id) }}" enctype="multipart/form-data">
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
            <label for="name">Nama Ayah</label>
            <select class="form-control" id="ayah_id" name="ayah_id">
              <option>Silahkan Pilih Data</option>
              @forelse ($user as $person)
              <option value="{{ $person->id }}" {{$item->ayah_id == $person->id ? 'selected' : ''  }}>{{ $person->person_id . '-' . $person->name . '-' . $person->date_of_birth }}</option>
              @empty
                  
              @endforelse
            </select>
          </div>
          <div class="form-group">
            <label for="name">Nama Ibu</label>
            <select class="form-control" id="ibu_id" name="ibu_id">
              <option>Silahkan Pilih Data</option>
              @forelse ($user as $person)
              <option value="{{ $person->id }}" {{$item->ibu_id == $person->id ? 'selected' : ''  }}>{{ $person->person_id . '-' . $person->name . '-' . $person->date_of_birth }}</option>
              @empty
                  
              @endforelse
            </select>
          </div>
          
          <div class="form-group">
            <label for="name">Nama Pasangan</label>
            <select class="form-control" id="pasangan_id" name="pasangan_id">
              <option>Silahkan Pilih Data</option>
              @forelse ($user as $person)
              <option value="{{ $person->id }}" {{$item->pasangan_id == $person->id ? 'selected' : ''  }}>{{ $person->person_id . '-' . $person->name . '-' . $person->date_of_birth }}</option>
              @empty
                  
              @endforelse
            </select>
          </div>
          <div class="form-group">
            <label for="name">Nama Ayah Pasangan</label>
            <select class="form-control" id="ayah_pasangan_id" name="ayah_pasangan_id">
              <option>Silahkan Pilih Data</option>
              @forelse ($user as $person)
              <option value="{{ $person->id }}" {{$item->ayah_pasangan_id == $person->id ? 'selected' : ''  }}>{{ $person->person_id . '-' . $person->name . '-' . $person->date_of_birth }}</option>
              @empty
                  
              @endforelse
            </select>
          </div>
          <div class="form-group">
            <label for="name">Nama Ibu Pasangan</label>
            <select class="form-control" id="ibu_pasangan_id" name="ibu_pasangan_id">
              <option>Silahkan Pilih Data</option>
              @forelse ($user as $person)
              <option value="{{ $person->id }}" {{$item->ibu_pasangan_id == $person->id ? 'selected' : ''  }}>{{ $person->person_id . '-' . $person->name . '-' . $person->date_of_birth }}</option>
              @empty
                  
              @endforelse
            </select>
          </div>
          <div class="form-group">
            <label for="name">Nama Wali</label>
            <select class="form-control" id="wali_id" name="wali_id">
              <option>Silahkan Pilih Data</option>
              @forelse ($user as $person)
              <option value="{{ $person->id }}" {{$item->wali_id == $person->id ? 'selected' : ''  }}>{{ $person->person_id . '-' . $person->name . '-' . $person->date_of_birth }}</option>
              @empty
                  
              @endforelse
            </select>
          </div>
    
          <div class="form-group">
            <label for="name">Nama Pasangan Terdahulu</label>
            <select class="form-control" id="pasangan_dulu_id" name="pasangan_dulu_id">
              <option>Silahkan Pilih Data</option>
              <option value=" ">Tidak ada</option>
              @forelse ($user as $person)
              <option value="{{ $person->id }}" {{$item->pasangan_dulu_id == $person->id ? 'selected' : ''  }}>{{ $person->person_id . '-' . $person->name . '-' . $person->date_of_birth }}</option>
              @empty
                  
              @endforelse
            </select>
          </div>
          <div class="form-group">
            <label for="surat_id">Surat</label>
            <select class="form-control" id="surat_id" name="surat_id">
              <option value="1" {{$item->surat_id == 1 ? 'selected' : ''  }}>Keterangan</option>
              <option value="2" {{$item->surat_id == 2 ? 'selected' : ''  }}>Permohonan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="place">Tempat</label>
            <input type="text" class="form-control" id="place" name="place" value="{{ $item->place }}" placeholder="Tempat">
          </div>
          <div class="form-group">
            <label for="mas_kawin">Mas Kawin</label>
            <input type="text" class="form-control" id="mas_kawin" name="mas_kawin" value="{{ $item->mas_kawin }}" placeholder="Mas Kawin">
          </div>

          <div class="form-group">
            <label for="time">Waktu</label>
            <input type="datetime-local" class="form-control" id="time" name="time" value="{{ $item->time }}">
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
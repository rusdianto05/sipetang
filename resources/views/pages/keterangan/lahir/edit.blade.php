@extends('layouts.app')
@section('title', 'Keterangan lahir')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Surat Keterangan lahir</h4>
        <p class="card-description">
          Edit form dibawah ini
        </p>
        <form class="forms-sample" method="POST" action="{{ url('/keterangan/lahir/'.$item->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
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
            <label for="surat_id">Surat</label>
            <select class="form-control" id="surat_id" name="surat_id">
              <option value="1" {{$item->surat_id == 1 ? 'selected' : ''  }}>Keterangan</option>
              <option value="2" {{$item->surat_id == 2 ? 'selected' : ''  }}>Permohonan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="name">Nama Ayah</label>
            <select class="form-control" id="ayah_id" name="ayah_id">
              <option>Silahkan Pilih Data</option>
              @forelse ($user as $item)
              <option value="{{ $person->id }}" {{$item->user_id == $person->id ? 'selected' : ''  }}>{{ $person->person_id . '-' . $person->name . '-' . $person->date_of_birth }}</option>
              @empty
                  
              @endforelse
            </select>
          </div>
          <div class="form-group">
            <label for="name">Nama Ibu</label>
            <select class="form-control" id="ibu_id" name="ibu_id">
              <option>Silahkan Pilih Data</option>
              @forelse ($user as $item)
              <option value="{{ $person->id }}" {{$item->user_id == $person->id ? 'selected' : ''  }}>{{ $person->person_id . '-' . $person->name . '-' . $person->date_of_birth }}</option>
              @empty
                  
              @endforelse
            </select>
          </div>
          <div class="form-group">
            <label for="name">Nama Pelapor</label>
            <select class="form-control" id="pelapor_id" name="pelapor_id">
              <option>Silahkan Pilih Data</option>
              @forelse ($user as $item)
              <option value="{{ $person->id }}" {{$item->user_id == $person->id ? 'selected' : ''  }}>{{ $person->person_id . '-' . $person->name . '-' . $person->date_of_birth }}</option>
              @empty
                  
              @endforelse
            </select>
          </div>
          <div class="form-group">
            <label for="pelapor_hubungan">Hubungan Pelapor</label>
            <input type="text" class="form-control" value="{{ $item->pelapor_hubungan }}" id="pelapor_hubungan" name="pelapor_hubungan" placeholder="Hubungan Pelapor">
          </div>
          <div class="form-group">
            <label for="nama_anak">Nama Anak</label>
            <input type="text" class="form-control" id="nama_anak" value="{{ $item->nama_anak }}" name="nama_anak" placeholder="Nama Anak">
          </div>
          <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <select name="gender" id="gender">
              <option value="laki-laki" {{$item->gender == 'laki-laki' ? 'selected' : ''  }}>Laki-laki</option>
              <option value="perempuan" {{$item->gender == 'perempuan' ? 'selected' : ''  }}>Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="kondisi">Kondisi</label>
            <select name="kondisi" id="kondisi">
              <option value="hidup" {{$item->kondisi == 'hidup' ? 'selected' : ''  }}>Hidup</option>
              <option value="mati" {{$item->kondisi == 'mati' ? 'selected' : ''  }}>Mati</option>
          </div>
          <div class="form-group">
            <label for="lama_kandungan">Lama Kandungan</label>
            <input type="text" class="form-control" id="lama_kandungan" value="{{ $item->lama_kandungan }}" name="lama_kandungan" placeholder="Lama Kandungan">
          </div>
          <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" value="{{ $item->tanggal_lahir }}" name="tanggal_lahir" placeholder="Tanggal Lahir">
          </div>
          <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" value="{{ $item->tempat_lahir }}" name="tempat_lahir" placeholder="Tempat Lahir">
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
              <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>Pending</option>
              <option value="approved" {{ $item->status == 'approved' ? 'selected' : '' }}>Diterima</option>
              <option value="rejected" {{ $item->status == 'rejected' ? 'selected' : '' }}>Ditolak</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <button type="reset" class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
@endsection
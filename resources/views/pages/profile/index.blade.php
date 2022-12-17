@extends('layouts.app')
@section('title', 'Profile')
@section('content')
<div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Edit Profile</h4>
              <p class="card-description">
                Edit Data Profile Anda
              </p>
              <form class="forms-sample" action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                @if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li><p style="color:red;">{{ $error }}</p></li>
						@endforeach
					</ul>
				</div>
			@endif
                <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Nama">
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="person_id">NIK</label>
                    <input type="text" class="form-control" name="person_id" value="{{ $user->person_id }}" placeholder="NIK">
                  </div>
                  <div class="form-group">
                    <label for="family_id">No KK</label>
                    <input type="text" class="form-control" name="family_id" value="{{ $user->family_id }}" placeholder="No KK">
                  </div>
                  <div class="form-group">
                    <label for="phone">No Handphone</label>
                    <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" placeholder="No HP">
                  </div>
                  <div class="form-group">
                    <label for="family_id">Agama</label>
                    <select name="religion" class="form-control" required>
                        <option value="Islam" {{ $user->religion == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Kristen" {{ $user->religion == 'Kristen' ? 'selected' : '' }} >Kristen</option>
                        <option value="Katholik" {{ $user->religion == 'Katholik' ? 'selected' : '' }}>Katholik</option>
                        <option value="Khonghucu" {{ $user->religion == 'Khonghucu' ? 'selected' : '' }}>Khonghucu</option>
                        <option value="Hindu" {{ $user->religion == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Budha" {{ $user->religion == 'Budha' ? 'selected' : '' }}>Budha</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="gender">Jenis Kelamin</label>
                    <select name="gender" class="form-control" required>
                        <option value="male" {{ $user->religion == 'male' ? 'selected' : '' }}>Laki - Laki</option>
                        <option value="female" {{ $user->religion == 'female' ? 'selected' : '' }} >Perempuan</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="citizenship">Kewarganegaraan</label>
                    <input type="text" class="form-control" name="citizenship" value="{{ $user->citizenship }}" placeholder="Kewarganegaraan">
                  </div>
                  <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea class="form-control" id="exampleTextarea1" name="address" rows="4">{{ $user->address }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="blood_group">Golongan Darah</label>
                    <select name="blood_group" class="form-control" required>
                        <option value="A" {{ $user->blood_group == 'A' ? 'selected' : '' }}>A</option>
                        <option value="AB" {{ $user->blood_group == 'AB' ? 'selected' : '' }}>AB</option>
                        <option value="B" {{ $user->blood_group == 'B' ? 'selected' : '' }}>B</option>
                        <option value="O" {{ $user->blood_group == 'O' ? 'selected' : '' }}>O</option>
                        <option value="-" {{ $user->blood_group == '-' ? 'selected' : '' }}>Tidak Tahu</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="married_status">Status Perkawinan</label>
                    <select name="married_status" class="form-control" required>
                        <option value="Belum Kawin" {{ $user->married_status == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                        <option value="Kawin" {{ $user->married_status == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                        <option value="Cerai Hidup" {{ $user->married_status == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                        <option value="Cerai Mati" {{ $user->married_status == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="job">Pekerjaan</label>
                    <input type="text" class="form-control" name="job" value="{{ $user->job }}" placeholder="Pekerjaan Anda">
                  </div>
                  <div class="form-group">
                    <label for="last_education">Pendidikan</label>
                    <input type="text" class="form-control" name="last_education" value="{{ $user->last_education }}" placeholder="Pendidikan">
                  </div>
                  <div class="form-group">
                    <label for="place_of_birth">Tempat Lahir</label>
                    <input type="text" class="form-control" name="place_of_birth" value="{{ $user->place_of_birth }}" placeholder="Tempat Lahir">
                  </div>
                  <div class="form-group">
                    <input type="date" name="date_of_birth" class="form-control" value="{{ $user->date_of_birth }}" required>
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
              </form>
            </div>
          </div>
        </div>
  </div>
@endsection
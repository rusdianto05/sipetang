<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register Data SiPetang</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="asset/register/css/montserrat-font.css">
	<link rel="stylesheet" type="text/css" href="asset/register/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="asset/register/css/style.css"/>
</head>
<body class="form-v10">
	
	<div class="page-content">
		<div class="form-v10-content">
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li><p style="color:red;">{{ $error }}</p></li>
						@endforeach
					</ul>
				</div>
			@endif
			<form class="form-detail" action="{{ route('register') }}" method="POST" id="myform">
                @csrf
				<div class="form-left">
					<h2>Akun Information</h2>
                    <div class="form-row">
						<input type="text" name="name" class="company" id="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
					</div>
                    <div class="form-row">
						<input type="email" name="email" class="company" id="email" value="{{ old('email') }}" placeholder="Email Untuk login" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
					</div>
                    <div class="form-row">
						<input type="password" name="password" class="company" id="password" placeholder="Password Login" required>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="number" name="phone" id="phone" class="input-text" value="{{ old('phone') }}" placeholder="No Handphone" required>
						</div>
						<div class="form-row form-row-2">
							<select name="gender" required>
							    <option value="male">Laki - Laki</option>
							    <option value="female">Perempuan</option>
							</select>
							<span class="select-btn">
							  	<i class="zmdi zmdi-chevron-down"></i>
							</span>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row form-row-3">
							<input type="text" name="person_id" class="business" id="person_id" value="{{ old('person_id') }}" placeholder="NIK" required>
						</div>
						<div class="form-row form-row-4">
							<input type="text" name="family_id" class="business" id="family_id" value="{{ old('family_id') }}" placeholder="No KK" required>
						</div>
					</div>
				</div>
				<div class="form-right">
					<h2>Detail Informasi</h2>
					<div class="form-row">
						<input type="text" name="address" class="street" id="address" placeholder="Alamat" value="{{ old('address') }}" required>
					</div>
					<div class="form-row">
						<input type="text" name="citizenship" class="additional" id="citizenship" value="{{ old('citizenship') }}" placeholder="Kewarganegaraan" required>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<select name="religion" required>
                                <option value="">Agama Anda</option>
							    <option value="Islam">Islam</option>
							    <option value="Kristen">Kristen</option>
							    <option value="Katholik">Katholik</option>
							    <option value="Khonghucu">Khonghucu</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
							</select>
						</div>
						<div class="form-row form-row-2">
							<select name="blood_group" required>
                                <option value="">Pilih Golongan Darah Anda</option>
							    <option value="A">A</option>
							    <option value="AB">AB</option>
							    <option value="B">B</option>
							    <option value="O">O</option>
                                <option value="-">Tidak Tahu</option>
							</select>
							<span class="select-btn">
							  	<i class="zmdi zmdi-chevron-down"></i>
							</span>
						</div>
					</div>
					<div class="form-row">
						<select name="married_status">
						    <option value="Belum Kawin">Belum Kawin</option>
						    <option value="Kawin">Kawin</option>
						    <option value="Cerai Hidup">Cerai Hidup</option>
						    <option value="Cerai Mati">Cerai Mati</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="job" class="code" id="job" placeholder="Pekerjaan" value="{{ old('job') }}" required>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="last_education" class="phone" id="last_education" value="{{ old('last_education') }}" placeholder="Pendidikan Terakhir" required>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="place_of_birth" class="code" id="place_of_birth" value="{{ old('place_of_birth') }}" placeholder="Tempat Lahir" required>
						</div>
						<div class="form-row form-row-2">
							<input type="date" name="date_of_birth" class="phone" id="date_of_birth" value="{{ old('birth_of_date') }}" required>
						</div>
					</div>
					<div class="form-row-last">
						<input type="submit" name="register" class="register" value="Daftar">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
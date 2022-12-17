<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="/home">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category">Menu Surat</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
          <i class="menu-icon mdi mdi-card-text-outline"></i>
          <span class="menu-title">Surat Keterangan</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements">
          @role('admin')
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/beda-nama') }}">Keterangan Beda Nama</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/usaha-lokal') }}">Keterangan Domisili Usaha<br> Lokal</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/usaha-luar') }}">Keterangan Domisili Usaha<br>  Luar</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/jamkesos') }}">Keterangan Jaminan <br> Kesehatan Sosial</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/ktp') }}">Keterangan KTP</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/lahir') }}">Keterangan Lahir</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/mati') }}">Keterangan Meninggal</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/pengantar') }}">Keterangan Pengantar</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/nikah') }}">Keterangan Nikah</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/pindah') }}">Keterangan Pindah</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/rujuk') }}">Keterangan Rujuk</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/cerai') }}">Keterangan Cerai</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/usaha') }}">Keterangan Usaha</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/wali') }}">Keterangan Wali</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/sktm') }}">Keterangan SKTM</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/jalan') }}">Keterangan Jalan</a></li>
          </ul>
          @endrole
          @role('user')
          <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/beda-nama/show') }}">Keterangan Beda Nama</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/usaha-lokal/show') }}">Keterangan Domisili Usaha<br> Lokal</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/usaha-luar/show') }}">Keterangan Domisili Usaha<br>  Luar</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/jamkesos/show') }}">Keterangan Jaminan <br> Kesehatan Sosial</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/ktp/show') }}">Keterangan KTP</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/lahir/show') }}">Keterangan Lahir</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/mati/show') }}">Keterangan Meninggal</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/pengantar/show') }}">Keterangan Pengantar</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/nikah/show') }}">Keterangan Nikah</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/pindah/show') }}">Keterangan Pindah</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/rujuk/show') }}">Keterangan Rujuk</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/cerai/show') }}">Keterangan Cerai</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/usaha/show') }}">Keterangan Usaha</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/wali/show') }}">Keterangan Wali</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/sktm/show') }}">Keterangan SKTM</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('keterangan/jalan/show') }}">Keterangan Jalan</a></li>
          </ul>
          @endrole
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
          <i class="menu-icon mdi mdi-email"></i>
          <span class="menu-title">Surat Perijinan</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="charts">
          <ul class="nav flex-column sub-menu">
            @role('admin')
            <li class="nav-item"> <a class="nav-link" href="{{ url('perijinan/keramaian') }}">Ijin Keramaian</a></li>
            @endrole
            @role('user')
            <li class="nav-item"> <a class="nav-link" href="{{ url('perijinan/keramaian/show') }}">Ijin Keramaian</a></li>
            @endrole
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          <i class="menu-icon mdi mdi-file-document"></i>
          <span class="menu-title">Surat Permohonan</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="tables">
          <ul class="nav flex-column sub-menu">
            @role('admin')
            <li class="nav-item"> <a class="nav-link" href="{{ url('permohonan/akta') }}">Permohonan Akta</a></li>
            @endrole
            @role('user')
            <li class="nav-item"> <a class="nav-link" href="{{ url('permohonan/akta/show') }}">Permohonan Akta</a></li>
            @endrole
          </ul>
        </div>
        <div class="collapse" id="tables">
          <ul class="nav flex-column sub-menu">
            @role('admin')
            <li class="nav-item"> <a class="nav-link" href="{{ url('permohonan/cerai') }}">Permohonan Cerai</a></li>
            @endrole
            @role('user')
            <li class="nav-item"> <a class="nav-link" href="{{ url('permohonan/cerai/show') }}">Permohonan Cerai</a></li>
            @endrole
          </ul>
        </div>
        <div class="collapse" id="tables">
          <ul class="nav flex-column sub-menu">
            @role('admin')
            <li class="nav-item"> <a class="nav-link" href="{{ url('permohonan/nikah') }}">Permohonan Nikah</a></li>
            @endrole
            @role('user')
            <li class="nav-item"> <a class="nav-link" href="{{ url('permohonan/nikah/show') }}">Permohonan Nikah</a></li>
            @endrole
          </ul>
        </div>
        <div class="collapse" id="tables">
          <ul class="nav flex-column sub-menu">
            @role('admin')
            <li class="nav-item"> <a class="nav-link" href="{{ url('/permohonan/rubah-kk') }}">Permohonan Rubah KK</a></li>
            @endrole
            @role('user')
            <li class="nav-item"> <a class="nav-link" href="{{ url('/permohonan/rubah-kk/show') }}">Permohonan Rubah KK</a></li>
            @endrole
          </ul>
        </div>
      </li>
      <li class="nav-item nav-category">Profile</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="menu-icon mdi mdi-account-circle-outline"></i>
          <span class="menu-title">Profile</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="/profile">Edit Profile</a></li>
          </ul>
        </div>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <form action="{{ route('logout') }}" method="post">
              @csrf
              <li class="nav-item">
                <button type="submit" class="nav-link" style="border:none; background: none;"> Logout</button>
                <p> </p>
              </li>
            </form>
          </ul>
        </div>
      </li>
    </ul>
  </nav>
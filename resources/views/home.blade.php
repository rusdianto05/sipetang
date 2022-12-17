@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-sm-12">
          <div class="home-tab">
            <div class="tab-content tab-content-basic">
              <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                <div class="row">
                  <div class="col-sm-12">
                    <div class="statistics-details d-flex align-items-center justify-content-between">
                      <div>
                        <p class="statistics-title">Total User</p>
                        <h3 class="rate-percentage" style="text-align: center">{{ $totaluser }}</h3>
                        <p class="text-danger d-flex"></p>
                      </div>
                      <div>
                        <p class="statistics-title">Total Surat Diterima</p>
                        <h3 class="rate-percentage" style="text-align: center">{{ $totalacc }}</h3>
                        <p class="text-success d-flex"></p>
                      </div>
                      <div>
                        <p class="statistics-title">Total Surat Pending</p>
                        <h3 class="rate-percentage" style="text-align: center">{{ $totalpending }}</h3>
                        <p class="text-success d-flex"></p>
                      </div>
                      <div>
                        <p class="statistics-title">Total Surat Ditolak</p>
                        <h3 class="rate-percentage" style="text-align: center">{{ $totalreject }}</h3>
                        <p class="text-danger d-flex"></p>
                      </div>
                    </div>
                  </div>
                </div> 
                <div class="row">
                  <div class="col-lg-12 d-flex flex-column">
                    <div class="row flex-grow">
                      <div class="col-12 grid-margin stretch-card">
                        <div class="card card-rounded">
                          <div class="card-body">
                            <div class="d-sm-flex justify-content-between align-items-start">
                              <div>
                                <h4 class="card-title card-title-dash">User Terbaru</h4>
                               <p class="card-subtitle card-subtitle-dash">User Yang Baru Mendaftar</p>
                              </div>
                              @role('admin')
                              <div>
                                <a href="/cetakuser" class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="icon-printer"></i> Print</a>
                              </div>
                              @endrole
                            </div>
                            <div class="table-responsive  mt-1">
                              <table class="table select-table">
                                <thead>
                                  <tr>
                                    <th>Nama</th>
                                    @role('admin')
                                    <th>Nik</th>
                                    <th>No KK</th>
                                    @endrole
                                    <th>Email</th>
                                  </tr>
                                </thead>
                                <tbody width=100%>
                                  @foreach ($users as $user)
                                  <tr>
                                    <td>
                                      <div class="d-flex ">
                                        <div>
                                          <h6>{{ $user->name }}</h6>
                                        </div>
                                      </div>
                                    </td>
                                    @role('admin')
                                    <td>
                                      <h6>{{ $user->person_id }}</h6>
                                    </td>
                                    <td>{{ $user->family_id }}</td>
                                    @endrole
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
@endsection
@section('custom-script')
<script src="{{ asset('js/dashboard.js') }}"></script>
@endsection

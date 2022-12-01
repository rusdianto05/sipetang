<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | Sipetang</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    {{-- <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}"> --}}
    <link href="{{ url('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ url('https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />

    <script type="text/javascript" src="{{ url('https://code.jquery.com/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js') }}"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('custom-css')
</head>
<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
          <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
            <div class="me-3">
              <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                <span class="icon-menu"></span>
              </button>
            </div>
            <div>
              <a class="navbar-brand brand-logo" href="index.html">
                <img src="{{ asset('images/logo.svg') }}" alt="logo" />
              </a>
              <a class="navbar-brand brand-logo-mini" href="index.html">
                <img src="{{ asset('images/logo-mini.svg') }}" alt="logo" />
              </a>
            </div>
          </div>
          <div class="navbar-menu-wrapper d-flex align-items-top"> 
            <ul class="navbar-nav">
              <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                <h1 class="welcome-text">Selamat Datang, <span class="text-black fw-bold">{{ Auth::user()->name }}</span></h1>
              </li>
            </ul>
            <ul class="navbar-nav ms-auto">
              <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    @if(!empty(Auth::user()->photo))
                        <img class="img-xs rounded-circle" src="{{ asset('storage/'.Auth::user()->profile_photo_path) }}" alt="Profile image">
                    @else
                  <img class="img-xs rounded-circle" src="{{ asset('images/faces/face8.jpg') }}" alt="Profile image"> </a>
                    @endif
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                  <div class="dropdown-header text-center">
                    <img class="img-md rounded-circle" src="{{ asset('images/faces/face8.jpg') }}" alt="Profile image">
                    <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->name }}</p>
                    <p class="fw-light text-muted mb-0">{{ Auth::user()->person_id }}</p>
                  </div>
                  <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Edit Profile</a>
                  <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Log Out</a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
          <!-- partial:partials/_settings-panel.html -->
          <div class="theme-setting-wrapper">
            <div id="settings-trigger"><i class="ti-settings"></i></div>
            <div id="theme-settings" class="settings-panel">
              <i class="settings-close ti-close"></i>
              <p class="settings-heading">SIDEBAR SKINS</p>
              <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
              <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
              <p class="settings-heading mt-2">HEADER SKINS</p>
              <div class="color-tiles mx-0 px-4">
                <div class="tiles success"></div>
                <div class="tiles warning"></div>
                <div class="tiles danger"></div>
                <div class="tiles info"></div>
                <div class="tiles dark"></div>
                <div class="tiles default"></div>
              </div>
            </div>
          </div>
          <div id="right-sidebar" class="settings-panel">
            <i class="settings-close ti-close"></i>
            <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
              </li>
            </ul>
            <div class="tab-content" id="setting-content">
              <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
                <div class="add-items d-flex px-3 mb-0">
                  <form class="form w-100">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                      <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                    </div>
                  </form>
                </div>
                <div class="list-wrapper px-3">
                  <ul class="d-flex flex-column-reverse todo-list">
                    <li>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="checkbox" type="checkbox">
                          Team review meeting at 3.00 PM
                        </label>
                      </div>
                      <i class="remove ti-close"></i>
                    </li>
                    <li>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="checkbox" type="checkbox">
                          Prepare for presentation
                        </label>
                      </div>
                      <i class="remove ti-close"></i>
                    </li>
                    <li>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="checkbox" type="checkbox">
                          Resolve all the low priority tickets due today
                        </label>
                      </div>
                      <i class="remove ti-close"></i>
                    </li>
                    <li class="completed">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="checkbox" type="checkbox" checked>
                          Schedule meeting for next week
                        </label>
                      </div>
                      <i class="remove ti-close"></i>
                    </li>
                    <li class="completed">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="checkbox" type="checkbox" checked>
                          Project review
                        </label>
                      </div>
                      <i class="remove ti-close"></i>
                    </li>
                  </ul>
                </div>
                <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
                <div class="events pt-4 px-3">
                  <div class="wrapper d-flex mb-2">
                    <i class="ti-control-record text-primary me-2"></i>
                    <span>Feb 11 2018</span>
                  </div>
                  <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                  <p class="text-gray mb-0">The total number of sessions</p>
                </div>
                <div class="events pt-4 px-3">
                  <div class="wrapper d-flex mb-2">
                    <i class="ti-control-record text-primary me-2"></i>
                    <span>Feb 7 2018</span>
                  </div>
                  <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                  <p class="text-gray mb-0 ">Call Sarah Graves</p>
                </div>
              </div>
              <!-- To do section tab ends -->
              <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                <div class="d-flex align-items-center justify-content-between border-bottom">
                  <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                  <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal">See All</small>
                </div>
                <ul class="chat-list">
                  <li class="list active">
                    <div class="profile"><img src="{{ asset('/images/faces/face1.jpg') }}" alt="image"><span class="online"></span></div>
                    <div class="info">
                      <p>Thomas Douglas</p>
                      <p>Available</p>
                    </div>
                    <small class="text-muted my-auto">19 min</small>
                  </li>
                  <li class="list">
                    <div class="profile"><img src="{{ asset('images/faces/face2.jpg') }}" alt="image"><span class="offline"></span></div>
                    <div class="info">
                      <div class="wrapper d-flex">
                        <p>Catherine</p>
                      </div>
                      <p>Away</p>
                    </div>
                    <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                    <small class="text-muted my-auto">23 min</small>
                  </li>
                  <li class="list">
                    <div class="profile"><img src="{{ asset('images/faces/face3.jpg') }}" alt="image"><span class="online"></span></div>
                    <div class="info">
                      <p>Daniel Russell</p>
                      <p>Available</p>
                    </div>
                    <small class="text-muted my-auto">14 min</small>
                  </li>
                  <li class="list">
                    <div class="profile"><img src="{{ asset('images/faces/face4.jpg') }}" alt="image"><span class="offline"></span></div>
                    <div class="info">
                      <p>James Richardson</p>
                      <p>Away</p>
                    </div>
                    <small class="text-muted my-auto">2 min</small>
                  </li>
                  <li class="list">
                    <div class="profile"><img src="{{ asset('images/faces/face5.jpg') }}" alt="image"><span class="online"></span></div>
                    <div class="info">
                      <p>Madeline Kennedy</p>
                      <p>Available</p>
                    </div>
                    <small class="text-muted my-auto">5 min</small>
                  </li>
                  <li class="list">
                    <div class="profile"><img src="{{ asset('images/faces/face6.jpg') }}" alt="image"><span class="online"></span></div>
                    <div class="info">
                      <p>Sarah Graves</p>
                      <p>Available</p>
                    </div>
                    <small class="text-muted my-auto">47 min</small>
                  </li>
                </ul>
              </div>
              <!-- chat tab ends -->
            </div>
          </div>
          <!-- partial -->
          <!-- partial:partials/_sidebar.html -->
         @include('components.sidebar')
          <!-- partial -->
          @yield('content')
          <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('components.footer')
        <!-- partial -->
         </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
      @yield('custom-script')
      <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('vendors/progressbar.js/progressbar.min.js') }}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>
</body>
</html>

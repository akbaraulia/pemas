@if (Auth::user()->role == 'masyarakat')

@extends('pengaduan.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List Pengaduan </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('pengaduan.create') }}"> Create</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>Tanggal Pengaduan</th>
            <th>Nama Pelapor</th>
            <th>Isi Laporan</th>
            <th>Foto</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($pengaduans as $pengaduan)
        <?php
          $user_id = DB::table('users')->where('id', $pengaduan->user_id)->get();
        ?>
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $pengaduan->tgl_pengaduan }}</td>
            @foreach($user_id as $rows)
              <td>{{ $rows->name }}</td>
            @endforeach
            <td>{{ $pengaduan->isi_laporan }}</td>
            <td>
                <img src="{{ asset('uploads/'.$pengaduan->foto) }}" alt="" width="200" height="200">
            </td>
            <td>{{ $pengaduan->status}}</td>
            <td>
           
                    <a class="btn btn-primary" href="{{ route('tanggapan.index') }}">Tanggapanmu</a>
     

                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $pengaduans->links() !!}
@endif        



@if (Auth::user()->role == 'admin')


<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Halaman Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Choices.js-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" integrity="sha384-b5J5L6vxjbJ43h7VJKZ1d8xX9l2+rsuRryVNF0UB+u8qV3qY0u+OvZU6ByJU4rd4" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-AJaxhjDtLd+Onbg/8/ZrCjYK/NJZvGtZd+8X3TtUKmTzA0CJ69+itLtwJQWRifYn" crossorigin="anonymous"></script>

   
<link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <header class="header">   
      <nav class="navbar navbar-expand-lg py-3 bg-dash-dark-2 border-bottom border-dash-dark-1 z-index-10">
        <div class="search-panel">
          <div class="search-inner d-flex align-items-center justify-content-center">
            <div class="close-btn d-flex align-items-center position-absolute top-0 end-0 me-4 mt-2 cursor-pointer"><span>Close </span>
                  <svg class="svg-icon svg-icon-md svg-icon-heavy text-gray-700 mt-1">
                    <use xlink:href="#close-1"> </use>
                  </svg>
            </div>
            <div class="row w-100">
              <div class="col-lg-8 mx-auto">
                <form class="px-4" id="searchForm" action="#">
                  <div class="input-group position-relative flex-column flex-lg-row flex-nowrap">
                    <input class="form-control shadow-0 bg-none px-0 w-100" type="search" name="search" placeholder="What are you searching for...">
                    <button class="btn btn-link text-gray-600 px-0 text-decoration-none fw-bold cursor-pointer text-center" type="submit">Search</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between py-1">
          <div class="navbar-header d-flex align-items-center"><a class="navbar-brand text-uppercase text-reset" href="index.html">
              <div class="brand-text brand-big"><strong class="text-primary">Pengaduan</strong><strong>Masyarakat</strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div></a>
            <button class="sidebar-toggle">
                  <svg class="svg-icon svg-icon-sm svg-icon-heavy transform-none">
                    <use xlink:href="#arrow-left-1"> </use>
                  </svg>
            </button>
          </div>
          <ul class="list-inline mb-0">
            <li class="list-inline-item"><a class="search-open nav-link px-0" href="#">
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy text-gray-700">
                      <use xlink:href="#find-1"> </use>
                    </svg></a></li>
            <!-- Messages dropdown -->
            <li class="list-inline-item dropdown px-lg-2"><a class="nav-link text-reset px-1 px-lg-0" id="navbarDropdownMenuLink1" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                      <use xlink:href="#envelope-1"> </use>
                    </svg><span class="badge bg-dash-color-1">5</span></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink1">
                <li><a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="position-relative"><img class="avatar avatar-md" src="img/avatar-3.jpg" alt="Nadia Halsey">
                      <div class="availability-status bg-success"></div>
                    </div>
                    <div class="ms-3">   <strong class="d-block">Nadia Halsey</strong><span class="d-block text-xs">lorem ipsum dolor sit amit</span><small class="d-block">9:30am</small></div></a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="position-relative"><img class="avatar avatar-md" src="img/avatar-2.jpg" alt="Peter Ramsy">
                      <div class="availability-status bg-warning"></div>
                    </div>
                    <div class="ms-3">   <strong class="d-block">Nadia Halsey</strong><span class="d-block text-xs">lorem ipsum dolor sit amit</span><small class="d-block">9:30am</small></div></a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="position-relative"><img class="avatar avatar-md" src="img/avatar-1.jpg" alt="Sam Kaheil">
                      <div class="availability-status bg-danger"></div>
                    </div>
                    <div class="ms-3">   <strong class="d-block">Nadia Halsey</strong><span class="d-block text-xs">lorem ipsum dolor sit amit</span><small class="d-block">9:30am</small></div></a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="position-relative"><img class="avatar avatar-md" src="img/avatar-5.jpg" alt="Sara Wood">
                      <div class="availability-status bg-secondary"></div>
                    </div>
                    <div class="ms-3">   <strong class="d-block">Nadia Halsey</strong><span class="d-block text-xs">lorem ipsum dolor sit amit</span><small class="d-block">9:30am</small></div></a></li>
                <li><a class="dropdown-item text-center message" href="#"> <strong>See All Messages <i class="fas fa-angle-right ms-1"></i></strong></a></li>
              </ul>
            </li>
            <!-- Tasks dropdown                   -->
            <li class="list-inline-item dropdown px-lg-2"><a class="nav-link text-reset px-1 px-lg-0" id="navbarDropdownMenuLink2" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                      <use xlink:href="#paper-stack-1"> </use>
                    </svg><span class="badge bg-dash-color-3">9</span></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink2">
                <li><a class="dropdown-item" href="#">
                    <div class="d-flex justify-content-between mb-1"><strong>Task 1</strong><span>40% complete</span></div>
                    <div class="progress" style="height: 2px">
                      <div class="progress-bar bg-dash-color-1" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div></a></li>
                <li><a class="dropdown-item" href="#">
                    <div class="d-flex justify-content-between mb-1"><strong>Task 2</strong><span>20% complete</span></div>
                    <div class="progress" style="height: 2px">
                      <div class="progress-bar bg-dash-color-2" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div></a></li>
                <li><a class="dropdown-item" href="#">
                    <div class="d-flex justify-content-between mb-1"><strong>Task 3</strong><span>70% complete</span></div>
                    <div class="progress" style="height: 2px">
                      <div class="progress-bar bg-dash-color-3" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                    </div></a></li>
                <li><a class="dropdown-item" href="#">
                    <div class="d-flex justify-content-between mb-1"><strong>Task 4</strong><span>40% complete</span></div>
                    <div class="progress" style="height: 2px">
                      <div class="progress-bar bg-dash-color-4" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div></a></li>
                <li><a class="dropdown-item" href="#">
                    <div class="d-flex justify-content-between mb-1"><strong>Task 5</strong><span>30% complete</span></div>
                    <div class="progress" style="height: 2px">
                      <div class="progress-bar bg-dash-color-1" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    </div></a></li>
                <li>           <a class="dropdown-item text-center" href="#"> <strong>See All Tasks <i class="fas fa-angle-right ms-1"></i></strong></a></li>
              </ul>
            </li>
            <!-- Mega menu-->
            <li class="list-inline-item dropdown menu-large px-lg-2"><a class="nav-link text-sm text-reset px-1 px-lg-0" href="#" data-bs-toggle="dropdown">Mega <i class="fas fa-ellipsis-v ms-1"></i></a>
              <ul class="dropdown-menu megamenu dropdown-menu-dark p-4">
                <div class="row gy-3 mb-4">
                  <div class="col-lg-3">
                    <h6 class="mb-2 text-uppercase">Elements Heading</h6>
                    <ul class="list-unstyled text-gray-700">
                      <li class="py-1"><a class="inherit-link" href="#">Lorem ipsum dolor</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">Sed ut perspiciatis</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">Voluptatum deleniti</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">At vero eos</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">Consectetur adipiscing</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">Duis aute irure</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">Necessitatibus saepe</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">Maiores alias</a></li>
                    </ul>
                  </div>
                  <div class="col-lg-3">
                    <h6 class="mb-2 text-uppercase">Elements Heading</h6>
                    <ul class="list-unstyled text-gray-700">
                      <li class="py-1"><a class="inherit-link" href="#">Lorem ipsum dolor</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">Sed ut perspiciatis</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">Voluptatum deleniti</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">At vero eos</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">Consectetur adipiscing</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">Duis aute irure</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">Necessitatibus saepe</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">Maiores alias</a></li>
                    </ul>
                  </div>
                  <div class="col-lg-3">
                    <h6 class="mb-2 text-uppercase">Elements Heading</h6>
                    <ul class="list-unstyled text-gray-700">
                      <li class="py-1"><a class="inherit-link" href="#">Lorem ipsum dolor</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">Sed ut perspiciatis</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">Voluptatum deleniti</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">At vero eos</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">Consectetur adipiscing</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">Duis aute irure</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">Necessitatibus saepe</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">Maiores alias</a></li>
                    </ul>
                  </div>
                  <div class="col-lg-3">
                    <h6 class="mb-2 text-uppercase">Elements Heading</h6>
                    <ul class="list-unstyled text-gray-700">
                      <li class="py-1"><a class="inherit-link" href="#">Lorem ipsum dolor</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">Sed ut perspiciatis</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">Voluptatum deleniti</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">At vero eos</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">Consectetur adipiscing</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">Duis aute irure</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">Necessitatibus saepe</a></li>
                      <li class="py-1"><a class="inherit-link" href="#">Maiores alias</a></li>
                    </ul>
                  </div>
                </div>
                <div class="row text-center gy-3">
                  <div class="col-lg-2 col-md-4"><a class="d-block p-4 text-white bg-dash-color-1" href="#">
                          <svg class="svg-icon svg-icon-sm sv-icon-heavy text-white">
                            <use xlink:href="#time-1"> </use>
                          </svg>
                      <p class="text-sm d mb-0">Demo 1</p></a></div>
                  <div class="col-lg-2 col-md-4"><a class="d-block p-4 text-white bg-dash-color-2" href="#">
                          <svg class="svg-icon svg-icon-sm sv-icon-heavy text-white">
                            <use xlink:href="#time-1"> </use>
                          </svg>
                      <p class="text-sm d mb-0">Demo 2</p></a></div>
                  <div class="col-lg-2 col-md-4"><a class="d-block p-4 text-white bg-dash-color-3" href="#">
                          <svg class="svg-icon svg-icon-sm sv-icon-heavy text-white">
                            <use xlink:href="#time-1"> </use>
                          </svg>
                      <p class="text-sm d mb-0">Demo 3</p></a></div>
                  <div class="col-lg-2 col-md-4"><a class="d-block p-4 text-white bg-dash-color-4" href="#">
                          <svg class="svg-icon svg-icon-sm sv-icon-heavy text-white">
                            <use xlink:href="#time-1"> </use>
                          </svg>
                      <p class="text-sm d mb-0">Demo 4</p></a></div>
                  <div class="col-lg-2 col-md-4"><a class="d-block p-4 text-white bg-danger" href="#">
                          <svg class="svg-icon svg-icon-sm sv-icon-heavy text-white">
                            <use xlink:href="#time-1"> </use>
                          </svg>
                      <p class="text-sm d mb-0">Demo 5</p></a></div>
                  <div class="col-lg-2 col-md-4"><a class="d-block p-4 text-white bg-info" href="#">
                          <svg class="svg-icon svg-icon-sm sv-icon-heavy text-white">
                            <use xlink:href="#time-1"> </use>
                          </svg>
                      <p class="text-sm d mb-0">Demo 6</p></a></div>
                </div>
              </ul>
            </li>
            <!-- Languages dropdown    -->
            <li class="list-inline-item dropdown"><a class="nav-link dropdown-toggle text-sm text-reset px-1 px-lg-0" id="languages" rel="nofollow" data-bs-target="#" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="img/flags/16/GB.png" alt="English"><span class="d-none d-sm-inline-block ms-2">English</span></a>
              <ul class="dropdown-menu dropdown-menu-end mt-sm-3 dropdown-menu-dark" aria-labelledby="languages">
                <li><a class="dropdown-item" rel="nofollow" href="#"> <img class="me-2" src="img/flags/16/DE.png" alt="English"><span>German</span></a></li>
                <li><a class="dropdown-item" rel="nofollow" href="#"> <img class="me-2" src="img/flags/16/FR.png" alt="English"><span>French                   </span></a></li>
              </ul>
            </li>
            <li class="list-inline-item logout px-lg-2">                 <a class="nav-link text-sm text-reset px-1 px-lg-0" id="logout" href="login.html"> <span class="d-none d-sm-inline-block">Logout </span>
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                      <use xlink:href="#disable-1"> </use>
                    </svg></a></li>
          </ul>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center p-4"><img class="avatar shadow-0 img-fluid rounded-circle" src="img/avatar-6.jpg" alt="...">
          <div class="ms-3 title">
            <h1 class="h5 mb-1">Halo Admin !!!!</h1>
            <p class="text-sm text-gray-700 mb-0 lh-1">Admin Pengaduan Masyarakat</p>
          </div>
        </div><span class="text-uppercase text-gray-600 text-xs mx-3 px-2 heading mb-2">Main</span>
        <ul class="list-unstyled">
              <li class="sidebar-item"><a class="sidebar-link" href="/admin"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#real-estate-1"> </use>
                      </svg><span>Home </span></a></li>
              <li class="sidebar-item active"><a class="sidebar-link" href="/pengaduanadmin"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#portfolio-grid-1"> </use>
                      </svg><span>Pengaduan </span></a></li>
              <li class="sidebar-item"><a class="sidebar-link" href="/tanggapanadmin"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#survey-1"> </use>
                      </svg><span>Tanggapan </span></a></li>
              <li class="sidebar-item"><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#browser-window-1"> </use>
                      </svg><span>List Role </span></a>
                <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                  <li><a class="sidebar-link" href="#">Admin</a></li>
                  <li><a class="sidebar-link" href="#">Petugas</a></li>
                  <li><a class="sidebar-link" href="#">Masyarakat</a></li>
                </ul>
              </li>
             
      </nav>
      <div class="page-content">
            <!-- Page Header-->
            <div class="bg-dash-dark-2 py-4">
              <div class="container-fluid">
                <h2 class="h5 mb-0">Dashboard</h2>
              </div>
            </div>
       
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List Pengaduan </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('pengaduan.create') }}"> Create</a>
                <a href="/generateLaporan" class="btn btn-primary d-sm-inline-block d-none">Export</a>
              </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Tanggal Pengaduan</th>
            <th>User ID</th>
            <th>Isi Laporan</th>
            <th>Foto</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($pengaduans as $pengaduan)
      
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $pengaduan->tgl_pengaduan }}</td>
            <td>{{ $pengaduan->user_id }}</td>
            <td>{{ $pengaduan->isi_laporan }}</td>
            <td>
                <img src="{{ asset('uploads/'.$pengaduan->foto) }}" alt="" width="200" height="200">
            </td>
            <td>{{ $pengaduan->status}}</td>
            <td>
                
           
                    <a class="btn btn-primary" href="{{ route('pengaduan.edit',$pengaduan->id) }}">Edit</a>
                    <!-- Button trigger modal -->
                    <a class="btn btn-primary" href="{{ route('pengaduan.approval',$pengaduan->id) }}">Approve</a>
                    <a class="btn btn-primary" href="{{ route('tanggapan.create') }}">Tanggapi</a>

                 
                    <form action="{{ route('pengaduan.destroy',$pengaduan->id) }}" method="POST">
                           @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
                  <!-- Modal -->

                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $pengaduans->links() !!}
        <!-- Page Footer-->
        <footer class="position-absolute bottom-0 bg-dash-dark-2 text-white text-center py-3 w-100 text-xs" id="footer">
          <div class="container-fluid text-center">
            <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            <p class="mb-0 text-dash-gray">2021 &copy; Your company. Design by <a href="https://bootstrapious.com">Bootstrapious</a>.</p>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/just-validate/js/just-validate.min.js"></script>
    <script src="assets/vendor/chart.js/Chart.min.js"></script>
    <script src="assets/vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="assets/js/charts-home.js"></script>
    <!-- Main File-->
    <script src="assets/js/front.js"></script>

    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to BootstrapTemple website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
      
      
    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>
<div class="container">
    <br>
    <br>
    @yield('content')
</div>
   
</body>


</html>

@endif

@if (Auth::user()->role == 'petugas')



<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Halaman Petugas</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Choices.js-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" integrity="sha384-b5J5L6vxjbJ43h7VJKZ1d8xX9l2+rsuRryVNF0UB+u8qV3qY0u+OvZU6ByJU4rd4" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-AJaxhjDtLd+Onbg/8/ZrCjYK/NJZvGtZd+8X3TtUKmTzA0CJ69+itLtwJQWRifYn" crossorigin="anonymous"></script>

   
<link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <header class="header">   
      <nav class="navbar navbar-expand-lg py-3 bg-dash-dark-2 border-bottom border-dash-dark-1 z-index-10">
        <div class="search-panel">
          <div class="search-inner d-flex align-items-center justify-content-center">
            <div class="close-btn d-flex align-items-center position-absolute top-0 end-0 me-4 mt-2 cursor-pointer"><span>Close </span>
                  <svg class="svg-icon svg-icon-md svg-icon-heavy text-gray-700 mt-1">
                    <use xlink:href="#close-1"> </use>
                  </svg>
            </div>
            <div class="row w-100">
              <div class="col-lg-8 mx-auto">
                <form class="px-4" id="searchForm" action="#">
                  <div class="input-group position-relative flex-column flex-lg-row flex-nowrap">
                    <input class="form-control shadow-0 bg-none px-0 w-100" type="search" name="search" placeholder="What are you searching for...">
                    <button class="btn btn-link text-gray-600 px-0 text-decoration-none fw-bold cursor-pointer text-center" type="submit">Search</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between py-1">
          <div class="navbar-header d-flex align-items-center"><a class="navbar-brand text-uppercase text-reset" href="index.html">
              <div class="brand-text brand-big"><strong class="text-primary">Pengaduan</strong><strong>Masyarakat</strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">Pet</strong><strong>ugas</strong></div></a>
            <button class="sidebar-toggle">
                  <svg class="svg-icon svg-icon-sm svg-icon-heavy transform-none">
                    <use xlink:href="#arrow-left-1"> </use>
                  </svg>
            </button>
          </div>
          <ul class="list-inline mb-0">
            <li class="list-inline-item"><a class="search-open nav-link px-0" href="#">
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy text-gray-700">
                      <use xlink:href="#find-1"> </use>
                    </svg></a></li>
           
           
            <li class="list-inline-item logout px-lg-2">                 <a class="nav-link text-sm text-reset px-1 px-lg-0" id="logout" href="/logout"> <span class="d-none d-sm-inline-block">Logout </span>
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                      <use xlink:href="#disable-1"> </use>
                    </svg></a></li>
          </ul>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center p-4"><img class="avatar shadow-0 img-fluid rounded-circle" src="img/avatar-6.jpg" alt="...">
          <div class="ms-3 title">
            <h1 class="h5 mb-1">Halo Petugas !!!!</h1>
            <p class="text-sm text-gray-700 mb-0 lh-1">Petugas Pengaduan Masyarakat</p>
          </div>
        </div><span class="text-uppercase text-gray-600 text-xs mx-3 px-2 heading mb-2">Main</span>
        <ul class="list-unstyled">
              <li class="sidebar-item"><a class="sidebar-link" href="/petugas"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#real-estate-1"> </use>
                      </svg><span>Home </span></a></li>
              <li class="sidebar-item active"><a class="sidebar-link" href="/pengaduanpetugas"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#portfolio-grid-1"> </use>
                      </svg><span>Pengaduan </span></a></li>
              <li class="sidebar-item"><a class="sidebar-link" href="/tanggapanpetugas"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#survey-1"> </use>
                      </svg><span>Tanggapan </span></a></li>
             
      </nav>
      <div class="page-content">
            <!-- Page Header-->
            <div class="bg-dash-dark-2 py-4">
              <div class="container-fluid">
                <h2 class="h5 mb-0">Dashboard</h2>
              </div>
            </div>
       
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List Pengaduan </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('pengaduan.create') }}"> Create</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Tanggal Pengaduan</th>
            <th>User ID</th>
            <th>Isi Laporan</th>
            <th>Foto</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($pengaduans as $pengaduan)
      
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $pengaduan->tgl_pengaduan }}</td>
            <td>{{ $pengaduan->user_id }}</td>
            <td>{{ $pengaduan->isi_laporan }}</td>
            <td>
                <img src="{{ asset('uploads/'.$pengaduan->foto) }}" alt="" width="200" height="200">
            </td>
            <td>{{ $pengaduan->status}}</td>
            <td>
                <form action="{{ route('pengaduan.destroy',$pengaduan->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('pengaduan.edit',$pengaduan->id) }}">Edit</a>
                    <!-- Button trigger modal -->
                    <a class="btn btn-primary" href="">Detail</a>

                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                  <!-- Modal -->

                  <!-- Modal -->

                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $pengaduans->links() !!}
        <!-- Page Footer-->
        <footer class="position-absolute bottom-0 bg-dash-dark-2 text-white text-center py-3 w-100 text-xs" id="footer">
          <div class="container-fluid text-center">
            <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            <p class="mb-0 text-dash-gray">2021 &copy; Your company. Design by <a href="https://bootstrapious.com">Bootstrapious</a>.</p>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/just-validate/js/just-validate.min.js"></script>
    <script src="assets/vendor/chart.js/Chart.min.js"></script>
    <script src="assets/vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="assets/js/charts-home.js"></script>
    <!-- Main File-->
    <script src="assets/js/front.js"></script>

    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to BootstrapTemple website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
      
      
    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>
<div class="container">
    <br>
    <br>
    @yield('content')
</div>
   
</body>


</html>
@endif
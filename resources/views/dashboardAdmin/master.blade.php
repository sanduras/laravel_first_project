<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>SB Admin - {{__('master.title')}}</title>
  <!-- Bootstrap for meta-nav  -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap core CSS-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


  <link href="{{mix('/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="{{mix('/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{mix('/css/dataTables.bootstrap4.css')}}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{mix('/css/sb-admin.min.css')}}" rel="stylesheet">
  <link href="{{mix('/css/admincss.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="{{ url(app()->getLocale(),'dashboard') }}">{{__('master.title')}}</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>


    <!-- Navbar -->
    <div style="flex:1">
      <ul style="display: flex; justify-content:flex-end;" class="navbar-nav ml-auto ml-md-0">
        <li>
          <ul class="navbar-nav ml-auto">
            @if(count(config('app.languages')) > 1)
            <li class="nav-item dropdown d-md-down-none">
              <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                {{ strtoupper(app()->getLocale()) }}
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                @foreach($languages as $language)
                <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $language->title }}">{{ strtoupper ($language->title)}}-{{$language->details}}</a>
                @endforeach
              </div>
            </li>
            @endif
          </ul>

        </li>

        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" onclick="mySave();" id="userDropDown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <div class="block px-4 py-2 text-xs text-gray-400">
              <p style="color: gray; size:12px;"> {{__('master.settings')}} </p>
            </div>
            <a class="dropdown-item" href="{{ route('profile.show',app()->getLocale()) }}">{{__('master.profile')}}</a>
            <form method="POST" action="{{ route('logout',app()->getLocale()) }}">
                                @csrf
              <a class="dropdown-item" href="{{ route('logout',app()->getLocale()) }}"  onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
            </form>
          </div>
          
        </li>
      </ul>
    </div>
  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard',app()->getLocale()) }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>{{__('master.title')}}</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>{{__('master.pages')}}</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">{{__('master.operation')}}</h6>
          <a class="dropdown-item" href="{{ route('additem',app()->getLocale()) }}">{{__('master.add')}}</a>
          <a class="dropdown-item" href="{{route('viewlist',app()->getLocale())}}">{{__('master.view')}}</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-language" aria-hidden="true"></i>
          <span>Languages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="{{route('addlanguage',app()->getLocale())}}">Add language</a>
          <div class="dropdown">
            <h6 class="dropdown-header">Edit selected language</h6>
            @foreach ($languages as $language)
            <a class="dropdown-item text-white bg-dark" href="{{route('editlanguage',[app()->getLocale(),$language->id])}}">{{ strtoupper ($language->title)}}-{{$language->details}}</a>
            @endforeach
          </div>
        </div>
      </li>
    </ul>
    <div id="content-wrapper">
      @yield('content')
    </div>
  </div>

  </div>
  <!-- /.container-fluid -->

  <!-- Sticky Footer -->
  <footer class="sticky-footer">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright © Your Website 2018</span>
      </div>
    </div>
  </footer>

  </div>
  <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  </script>

  <!-- Bootstrap core JavaScript-->
  <script src="{{mix('js/jquery/jquery.min.js')}}"></script>
  <script src="{{mix('js/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  </script>

  <!-- Core plugin JavaScript-->
  <script src="{{mix('js/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Page level plugin JavaScript-->

  <script src="{{mix('js/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{mix('js/datatables/dataTables.bootstrap4.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{mix('js/sb-admin.min.js')}}"></script>

  <!-- Demo scripts for this page-->
  <script src="{{mix('js/demo/datatables-demo.js')}}"></script>

  <!--lfm -->
  <script src="{{mix('js/lfm.js')}}"> </script>
  <script src="{{asset('js/ckeditor.js')}}"> </script>
  <script src="{{asset('js/create-article.js')}}"> </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dbb/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dbb/dist/css/adminlte.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>My Media - @yield('title')</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('response_images/empty_cart.png')}}" />
    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Tangerine">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap');

        * {
            font-family: 'Roboto Mono', monospace;
            transition: 0.5s;
        }
        .fa-arrow-left {
            cursor: pointer;
        }

        a {
           text-decoration: none;
           transition: 0.5s;

        }
        .sidebar .my-hover li:hover a{
            color: white !important;
        }
        .sidebar .my-hover li a{
            color: rgb(226, 207, 207) !important;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav justify-content-between">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item dropdown float-end">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     @if (Auth::user()->image == null)
                     <img src="{{asset('response_images/unk.jfif')}}" style="width:30px; height:30px" class="rounded" alt="">
                     @else
                       <img src="{{asset('storage/'.Auth::user()->image)}}" alt="" style="width:30px; height:30px" class="rounded">
                     @endif
                     {{Auth::user()->name}}
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{route('profile#profilePage')}}"><i class="fa-solid fa-user"></i> Profile</a></li>
                      <li><a class="dropdown-item" href="{{route('admin#changepw')}}"><i class="fa-solid fa-lock"></i> Change Password</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>


            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar bg-dark elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('dashboard') }}" class="brand-link">

                <h3 class="brand-text text-center fw-bold">  <span class="text-danger">Holy</span> <span class="text-warning">Media!</span></h3>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->

                <!-- Sidebar Menu -->
                <nav class="mt-2 my-hover">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                <i class="fa-solid fa-home"></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('category#categoryPage') }}" class="nav-link">
                                <i class="fas fa-list"></i>
                                <p>
                                    Category
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('trend#trendPage') }}" class="nav-link">
                                <i class="fa-solid fa-hashtag"></i>
                                <p>
                                    Trending Posts
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('posts#postPage') }}" class="nav-link">
                                <i class="fas fa-book"></i>
                                <p>
                                    Posts
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('profile#profilePage') }}" class="nav-link">
                                <i class="fas fa-user-circle"></i>
                                <p>
                                    My Profile
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('list#listPage') }}" class="nav-link">
                                <i class="fas fa-biking"></i>
                                <p>
                                    List
                                </p>
                            </a>
                        </li>

                        <li >
                           <form action="{{route('logout')}}"class="nav-item" method="post">
                            @csrf
                               <button type="submit" class="btn btn-danger w-100 rounded border-0 bg-danger">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                               </button>

                           </form>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('admin-content')

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('dbb/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('dbb/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('dbb/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dbb/dist/js/demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>

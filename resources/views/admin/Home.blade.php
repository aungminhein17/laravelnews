@extends('layouts')

@section('title','Home')

@section('admin-content')
     <div class="row">
        <div class="col-xl-3 col-md-6 col-sm-6 mt-2">
            <a href="">
                <div class="card border-left border-warning  shadow h-100 py-2 px-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs fs-6 font-weight-bold text-warning text-uppercase mb-1">
                                    Posts</div>
                                <div class="h5 mb-0 font-weight-bold text-muted">{{$posts}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-book fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-6 col-sm-6 mt-2 ">
            <a href="">
                <div class="card  border-left border-warning  shadow h-100 py-2 px-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs fs-6 font-weight-bold text-warning text-uppercase mb-1">
                                    Categories</div>
                                <div class="h5 mb-0 font-weight-bold text-muted">{{$categories}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-layer-group fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-6 col-sm-6 mt-2">
            <a href="">
                <div class="card border-left border-warning  shadow h-100 py-2 px-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs fs-6 font-weight-bold text-warning text-uppercase mb-1">
                                    Users</div>
                                <div class="h5 mb-0 font-weight-bold text-muted"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-6 col-sm-6 mt-2 ">
            <a href="">
                <div class="card border-left border-warning  shadow h-100 py-2 px-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs fs-6 font-weight-bold text-warning text-uppercase mb-1">
                                    Users</div>
                                <div class="h5 mb-0 font-weight-bold text-muted"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

     </div>
@endsection

@extends('layouts')

@section('title','Categories')

@section('admin-content')
<section class="content">
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <a href="{{route('category#createPage')}}">
                    <button class="btn btn-sm btn-outline-dark">+ Add Category</button>
                </a>
                <span class="text-danger">{{$category->total()}} Categories</span>
              </h3>

              <div class="card-tools">
              <form action="">
                <div class="input-group input-group-sm mt-1" style="width: 150px;">
                    <input type="text" name="key" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
              </form>
              </div>

            </div>
           @if (count($category) != 0)
                   <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Category Name</th>
                      <th>Description</th>
                      <th>Created Date</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($category as $c)
                   <tr>
                      <td>{{$c->id}}</td>
                      <td class="text-primary">{{$c->title}}</td>
                      <td>{{$c->description}}</td>
                      <td>{{$c->created_at->format('j-F')}}</td>
                      <td>
                        <a href="{{route('category#updatePage',$c->id)}}" class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></a>
                        <a href="{{route('category#delete',$c->id)}}" class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
              <div class="mt-2 mx-2">
                {{ $category->appends(request()->query())->links() }}
            </div>
              <!-- /.card-body -->
          </div>
          @if (session('deleted'))
          <div class="alert alert-danger alert-dismissible fade show">
             <h4 class=""><i class="fa-solid fa-tick"></i> {{session('deleted')}}</h4>
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          @else
          <div class="text-center">
           <img src="{{asset('response_images/inbox-zero.png')}}" width="300px" alt="">
          </div>
          @endif
          <!-- /.card -->
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>
  @endsection

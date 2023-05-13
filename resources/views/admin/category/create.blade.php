@extends('layouts')

@section('title','Create Category')

@section('admin-content')
<section class="content">
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-8 offset-3 mt-5">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2 justify-content-between">
                <legend class="text-center">Categories</legend>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <form class="form-horizontal" action="{{route('category#create')}}" method="post">
                        @csrf
                      <div class="form-group row">

                        @error('category')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                        <div class="col">
                          <input type="text" class="form-control @error('category') is-invalid
                          @enderror" value="{{old('category')}}" name="category" id="inputName" placeholder="Category Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                        <div class="col">
                          <input type="text" value="{{old('description')}}" name="description" class="form-control  @error('description') is-invalid
                          @enderror" id="inputEmail" placeholder="Description">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="d-flex justify-content-between">
                          <button type="submit" class="btn bg-dark text-white">Create</button>
                          <a href="{{route('category#categoryPage')}}" class="btn btn-primary">Category List</a>
                        </div>
                      </div>
                    </form>
                  </div>

                  </div>
                </div>
              </div>
              @if (session('created'))
              <div class="alert alert-info alert-dismissible fade show">
                 <h4 class="text-success"><i class="fa-solid fa-tick"></i> {{session('created')}}</h4>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

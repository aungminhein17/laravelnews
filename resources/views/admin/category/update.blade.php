@extends('layouts')

@section('title','Update Category')

@section('admin-content')
<section class="content">
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-8 offset-3 mt-5">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <legend class="text-center">Categories</legend>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <form class="form-horizontal" action="{{route('category#update')}}" method="post">
                        @csrf
                      <div class="form-group row">

                        @error('category')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                        <div class="col">
                          <input type="text" class="form-control @error('category') is-invalid
                          @enderror" name="category" id="inputName" value="{{$dbVal->title,old('category')}}" placeholder="Category Name">
                        </div>
                      </div>
                      <input type="hidden" name="categoryId" value="{{$dbVal->id}}">
                      <div class="form-group row">
                        @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                        <div class="col">
                          <input type="text" name="description" class="form-control  @error('description') is-invalid
                          @enderror" id="inputEmail" value="{{$dbVal->description,old('description')}}" placeholder="Description">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-">
                          <button type="submit" class="btn bg-dark text-white">Update</button>
                        </div>
                      </div>
                    </form>

                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@extends('layouts')

@section('title', 'Edit Post')

@section('admin-content')
<div class="row">
    <div class="col"></div>
    <div class="col-lg-8">
        <img src="{{asset('storage/'.$postData->image)}}" style="max-width: 300px" class="img my-2 img-thumbnail" alt="">

        <div class="row">
        </div>
        <form action="{{route('post#update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <input type="text" class="form-control  @error('title') is-invald @enderror" id="floatingInput" placeholder="Title" name="title" value="{{$postData->title}}">

            </div>
            <input type="hidden" value="{{$postData->id}}" name="id">
            <div class="form-group mb-3">
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <textarea class="form-control  @error('description') is-invald @enderror" placeholder="Description" id="floatingTextarea2" style="height: 100px"
                    name="description">{{$postData->description}}</textarea>

            </div>

            <div class="mb-3">
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <input type="file" class="form-control  @error('image') is-invald @enderror" name="image" >
            </div>
            <div class=" mb-4">
                @error('categoryId')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <select id="inputState" value="{{$postData->category_id}}" name="categoryId" class="form-select @error('categoryId') is-invald @enderror">
                    @foreach ($category as $c)
                        <option value="{{ $c->id }}" class="fs-6">{{ $c->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Post</button>
        </form>
    </div>
    <div class="col"></div>
</div>
@endsection

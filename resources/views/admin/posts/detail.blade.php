@extends('layouts')

@section('title', 'Post')

@section('admin-content')
<div class="container">
    <div class="row pt-3">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 col-md-8 col-md-10">
           Category -  {{$post->category_title}}

              <div class="card" style="">
                <div class="card-header d-flex justify-content-between">
                        <h6 class="pt-0">{{$post->created_at->format('j.F.Y')}}</h6>
                        <h6 class="text-end text-warning">{{$post->title}}</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <img src="{{asset('storage/'.$post->image)}}"  class="" alt="">
                    </div>
                    <div class="row text-muted des">
                        {{$post->description}}
                    </div>
                    <a href="{{route('post#edit',$post->id)}}" class="btn btn-primary">
                        <i class="fa-solid fa-pen-square"></i> Edit
                    </a>
                    {{$post->post_count}} Views

                </div>

                <div class="card-footer">
                    <div class="row">
                        <div onclick="changeBackground()" class="col-4 text-center border-left border-light"><i class="fa-regular fa-thumbs-up"></i> Like</div>
                        <div onclick="changeBackground()" class="col-4 text-center border-left border-light"><i class="fa-regular fa-comment"></i> Comment</div>
                        <div onclick="changeBackground()" class="col-4 text-center border-left border-light"><i class="fa-solid fa-share"></i> Share</div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>

@endsection

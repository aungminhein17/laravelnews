@extends('layouts')

@section('title', 'Post')

@section('admin-content')
    <div class="container-lg">
        <div class="row p-3">
            <div class="col-lg-2">
                <i class="fa-solid fa-arrow-left " onclick="history.back()"></i>
            </div>
            <div class=" col-lg-8">
                <div class="">
                    <div class="row d-flex justify-content-center">
                        <img src="{{asset('storage/'.$post->image)}}" style="width: 400px" alt="">
                    </div>
                    <hr>
                    <h2 class="text-danger text-uppercase my-2">
                        {{$post->title}}
                    </h2>
                    <h4 class="text-muted my-2 fs-5">
                        {{$post->description}}
                    </h4>
                    <div class="d-lg-flex justify-content-between">
                        <h6 class="mt-lg-3">
                            {{$post->post_count}} Views
                        </h6>
                        <h6 class="mt-lg-3">
                            {{$post->created_at->format('j.F.Y.l | h:ia')}}
                        </h6>
                    </div>

                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
        @endsection

@extends('layouts')

@section('title', 'Post')

@section('admin-content')
    <div class="container-lg">
        <div class="row p-3">
            <div class="col-lg-1">
                <i class="fa-solid fa-arrow-left " onclick="history.back()"></i>
            </div>
            <div class=" col-lg-10 col-md-6">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="card-tools">
                            <form>
                                <div class="input-group input-group-sm mt-1" style="width: 200px;">
                                    <input type="text" name="key" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                   @if(count($post) != 0)
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap ">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Views</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($post as $p)
                                    <tr class="">

                                        <td class="text-primary align-middle"><a href="{{route('post#trendposts',$p->id)}}">
                                            {{ $p->title }}</a>
                                        </td>
                                        <td class=" align-middle">{{ $p->category_title }}</td>
                                        <td class=" align-middle">{{ Str::words($p->description, 5, '...') }}</td>
                                        <td class=" align-middle"><img src="{{ asset('storage/' . $p->image) }}"
                                                width="100px" alt=""></td>
                                        <td class=" align-middle">
                                            <a class="btn btn-warning btn-sm" href="{{ route('post#detail', $p->id) }}">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <span>
                                                {{$p->post_count}} Views
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                   @else
                    <div class="text-center">
                        <img src="{{asset('response_images/inbox-zero.png')}}" width="300px" alt="">
                       </div>
                   @endif
                </div>
                <div class="mt-2">
                    {{ $post->appends(request()->query())->links() }}
                </div>
            </div>
            <div class="col-lg-1"></div>
        @endsection

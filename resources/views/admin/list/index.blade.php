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
                        <h5 class="text-danger">{{$user->total()}} @if($user->total() > 1)users @else user @endif</h5>
                    </div>
                   @if(count($user) != 0)
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap ">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>

                                    <th>Address</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $u)
                                    <tr class="">
                                        <td class=" align-middle">
                                            @if ($u->image == null)
                                                <img  width="100px" src="{{asset('response_images/iconeee_1.jpg')}}" alt="">
                                            @else

                                            @endif
                                            <img src="{{ asset('storage/'. $u->image) }}"
                                            width="100px" alt="">
                                        </td>

                                        <td class="text-primary align-middle"><a href="{{route('user#details',$u->id)}}">
                                            {{ $u->name }}</a>
                                        </td>
                                        <td class=" align-middle">{{ $u->email }}</td>
                                        <td class=" align-middle">{{ $u->phone }}</td>
                                        <td class=" align-middle">{{ $u->address }}</td>
                                        <td class="align-middle"><a class="btn btn-danger" href="{{route('user#delete',$u->id)}}"> BAN
                                        </a></td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                   @else
                    <div class="justify-content-center d-flex align-items-center" style=" height: 40vh">
                        <h2 class="text-danger">Didn't find a user called {{request()->key}}!!!</h2>
                       </div>
                   @endif
                </div>
                <div class="mt-2">
                    {{ $user->appends(request()->query())->links() }}
                </div>
            </div>
            <div class="col-lg-1"></div>
        @endsection

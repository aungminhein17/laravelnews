@extends('layouts')

@section('title', 'Acount')

@section('admin-content')
    <div class="container-md">
        <i class="fa-solid fa-arrow-left  fs-3" onclick="history.back()"></i>

        <h3 class="text-warning justify-content-center d-flex">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <span class="text-danger me-2">Account</span> <span class="text-warning">Details</span>
        </h3>
        <div class="row text-center">
            @if (session('updateSuccess'))
                <div class="col-3 offset-8">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-check me-2"></i><strong>{{ session('updateSuccess') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                <div class="col"></div>
            @endif

        </div>
        <div class="row p-5 justify-content-center">
            <div class="col-md-4 offset-md-3 border-0 justify-content-center">
                <div class="image">
                    @if (Auth::user()->image == null)
                        <img class="rounded object-cover" src="{{ asset('response_images/unk.jfif') }}">
                    @else
                        <img class="img-thumbnail object-cover" src="{{ asset('storage/' . Auth::user()->image) }}"
                            alt="">
                    @endif
                </div>
            </div>
            <div class="col-md-5">
                <h6 class=" pb-2  border-bottom border-primary"><i class="fa-solid fa-circle-user "></i> <span
                        class="fs-6 text-muted">{{ Auth::user()->name }}</span></h6>
                <h6 class=" pb-2  border-bottom border-primary"><i class="fa-solid fa-book"></i> <span
                        class="fs-6">{{ Auth::user()->email }}</span></h6>
                <h6 class=" pb-2  border-bottom border-primary"><i class="fa-solid fa-phone"></i> <span
                        class="fs-6 text-muted">{{ Auth::user()->phone }}</span></h6>
                <h6 class=" pb-2  border-bottom border-primary"><i
                        class="fa-solid fa-location-dot text-danger"></i> <span
                        class="fs-6">{{ Auth::user()->address }}</span></h6>
                <h6 class=" pb-2  border-bottom border-primary"><i class="fa-solid fa-venus-mars "></i> <span
                        class="fs-6">{{ Auth::user()->gender }}</span></h6>
                <h6 class=" pb-2  border-bottom border-primary">Joined at - <span
                        class="fs-6 text-muted">{{ Auth::user()->created_at->format('j F Y') }}</span></h4>
                    <a href="{{ route('admin#editPage') }}" class="mt-2 w-100 btn btn-primary ">
                        <i class="fa-solid fa-pen-to-square"></i> Edit Profile
                    </a>
            </div>
        </div>

    </div>
@endsection

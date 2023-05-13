@extends('layouts')

@section('title', 'Post')

@section('admin-content')
    <div class="container">
        <div class="row p-3">
            <div class="col-lg-4">
                @if (session('posted'))
                    <div class="alert alert-info alert-dismissible fade show">
                        <h4 class="text-success"><i class="fa-solid fa-check"></i> {{ session('posted') }}
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('updated'))
                    <div class="alert alert-primary alert-dismissible fade show">
                        <h4 class="text-primary"><i class="fa-solid fa-check"></i> {{ session('updated') }}
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('deleted'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        <h4 class="text-danger"><i class="fa-solid fa-check"></i> {{ session('deleted') }}
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ route('post#create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <input type="text" class="form-control  @error('title') is-invald @enderror" id="floatingInput"
                            placeholder="Title" name="title">

                    </div>

                    <div class="form-group mb-3">
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <textarea class="form-control  @error('description') is-invald @enderror" placeholder="Description"
                            id="floatingTextarea2" style="height: 100px" name="description"></textarea>

                    </div>

                    <div class="mb-3">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <input type="file" class="form-control  @error('image') is-invald @enderror" name="image"
                            id="formGroupExampleInput" placeholder="Example input placeholder">
                    </div>
                    <div class=" mb-4">
                        @error('categoryId')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <select id="inputState" name="categoryId"
                            class="form-select @error('categoryId') is-invald @enderror">
                            @foreach ($category as $c)
                                <option value="{{ $c->id }}" class="fs-6">{{ $c->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Post</button>
                </form>
            </div>
            <div class=" col-lg-8 ">
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
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap ">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $p)
                                    <tr class="">
                                        <td class="text-primary align-middle">{{ $p->title }}</td>
                                        <td class=" align-middle">{{ $p->category_title }}</td>
                                        <td class=" align-middle">{{ Str::words($p->description, 5, '...') }}</td>
                                        <td class=" align-middle"><img src="{{ asset('storage/' . $p->image) }}"
                                                width="100px" alt=""></td>
                                        <td class=" align-middle">
                                            <a href="{{ route('post#edit', $p->id) }}"
                                                class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('post#delete', $p->id) }}"
                                                class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></a>
                                            <a class="btn btn-warning btn-sm" href="{{ route('post#detail', $p->id) }}"><i
                                                    class="fa-solid fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2 mx-2">
                        {{ $posts->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>

        @endsection
        <script>
            function changeBackground() {
                document.backgroundColor = red;
            }
            changeBackground()
        </script>

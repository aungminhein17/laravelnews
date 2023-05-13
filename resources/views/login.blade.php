<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Log In</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap');

        *{
            font-family: 'Roboto Mono', monospace;
        }
    </style>
</head>
<body>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0  my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row bg-white align-items-center"style="height: 80vh">
                            <div class="offset-3 col-lg-6 offset-3">
                                <div class="p-5 shadow-lg " >
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back From <span class="text-danger">Holy<span class="text-warning">Media!</span></span></h1>
                                    </div>
                                    <form class="user"action="{{route('login')}}" method="post">
                                        @csrf
                                        <div class="form-group my-2">
                                            <input type="email" value="{{old('email')}}" name="email" placeholder="Email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                                id="exampleInputEmail" aria-describedby="emailHelp">
                                                @error('email')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                        </div>
                                        <div class="form-group my-2">
                                            <input type="password"  value="{{old('password')}}" name="password" placeholder="Password" class="form-control form-control-user @error('password') is-invalid  @enderror" id="exampleInputPassword">
                                            @error('password')
                                                <small class="invalid-feedback">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group my-2">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit"class="btn btn-primary btn-user btn-block">Log In</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        Don't have a account? <a href="{{ route('auth#registerPage')}}">Sign Up Here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Register</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap');

        * {
            font-family: 'Roboto Mono', monospace !important;
        }
    </style>
</head>

<body>
    <div class="container ">

        <div class="row align-items-center" style="height: 100vh">
            <div class="offset-3 col-lg-6 offest-3">
                <div class="p-5 shadow-lg ">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create an Account! <span class="text-danger">Holy<span class="text-warning">Media!</span></span></h1>
                    </div>
                    <form class="user" action="{{ route('register') }}" method="post">
                        @csrf
                        @error('terms')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        {{-- terms --}}


                        <div class="form-group my-3">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <input type="text"
                                class="form-control form-control-user @error('name') is-invalid
                            @enderror"
                                placeholder="Name" name="name" value="{{ old('name') }}">
                        </div>
                        {{-- name --}}


                        <div class="form-group my-3">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <input type="email"
                                class="form-control form-control-user @error('email') is-invalid
                            @enderror"
                                id="exampleInputEmail" placeholder="Email Address" name="email"
                                value="{{ old('email') }}">
                        </div>
                        {{-- email --}}


                        <div class="form-group my-3">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <input type="text"
                                class="form-control form-control-user @error('phone') is-invalid
                            @enderror"
                                placeholder="Phone Number" name="phone" value="{{ old('phone') }}">
                        </div>
                        {{-- phone --}}


                        <div class="form-group my-3">
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <input type="text"
                                class="form-control form-control-user @error('address') is-invalid
                            @enderror"
                                placeholder="Address" name="address" value="{{ old('address') }}">
                        </div>
                        {{-- address --}}

                        <div class="col-md-7 mb-4">
                            @error('gender')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <select id="inputState" class="form-select" name="gender">
                                <option value="">Chooser gender</option>
                                <option value="male" class="fs-6">Male</option>
                                <option value="female" class="fs-6">Female</option>
                            </select>
                        </div>

                        <div class="form-group my-3">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <input type="password"
                                class="form-control form-control-user @error('password') is-invalid
                            @enderror"
                                id="exampleInputPassword" placeholder="Password" name="password">
                        </div>
                        {{-- password --}}

                        <div class="form-group my-3">
                            @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <input type="password"
                                class="form-control form-control-user @error('password_confirmation') is-invalid
                            @enderror"
                                id="exampleRepeatPassword" placeholder="Confirm Password" name="password_confirmation">
                        </div>
                        {{-- confirm --}}

                        <button type="submit" class="btn btn-primary btn-user btn-block">Register</button>
                    </form>
                    <hr>
                    <p class="text-center">
                        Already have account?
                        <a href="{{ route('auth#loginPage') }}">Sign In</a>
                    </p>
                </div>
            </div>
        </div>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>

</html>

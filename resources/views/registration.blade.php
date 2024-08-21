@extends('layout')
@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Register User</h3>
                    <div class="card-body">
                        <form action="{{ route('postsignup') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Name" id="name" class="form-control" name="name" autofocus>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email_address" class="form-control" name="email" autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password">
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="departement" id="departement" class="form-control" name="departement">
                                @if ($errors->has('departement'))
                                <span class="text-danger">{{ $errors->first('departement') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group mb-3">
                                <input type="number" placeholder="Tel" id="tel" class="form-control" name="Tel_user">
                                @if ($errors->has('Tel_user'))
                                <span class="text-danger">{{ $errors->first('Tel_user') }}</span>
                                @endif
                            </div>


                            <div class="form-group mb-3">
                            <input type="file" class="form-control" id="avatar_user" name="avatar_user" >
                                @if ($errors->has('avatar_user'))
                                <span class="text-danger">{{ $errors->first('avatar_user') }}</span>
                                @endif
                            </div>


                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remember"> Remember Me</label>
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Sign up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@extends('layoutLogin')
@section('content')

@if(\Session::has('message'))
    <div class="alert alert-danger " style="margin-top:40px; background-color:">
        {{\Session::get('message')}}
    </div>
@endif

<section id="hero" class="d-flex align-items-center" style="height:665px; background-color:#f2f2f2;margin-top:-20px;padding-left:0px;">
<div class="container-login100">
<div class="wrap-login100">
<form class="login100-form validate-form" method="POST" style="height:440px;" action="{{ route('postloginadmin') }}">
@csrf
<span class="login100-form-title p-b-48">
<img style="margin-top:5px;" src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/64/000000/external-user-interface-kiranshastry-lineal-kiranshastry-1.png"/>
</span>
<span class="login100-form-title p-b-26" > admin Login</span>


<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
<input class="input100" placeholder="Email" type="text" name="email" id="email" required>

 @if ($errors->has('email'))
    <div class="alert alert-danger" role="alert">
        {{ $errors->first('email') }}
    </div>
@endif
</div>
<div class="form-group mb-3">
    <input type="password" placeholder="Password" id="password" class="form-control" name="password">
    @if ($errors->has('password'))
        <div class="alert alert-danger" role="alert">
            {{ $errors->first('password') }}
        </div>
    @endif
</div>
<div class="container-login100-form-btn">
    <div class="wrap-login100-form-btn">
        <div class="login100-form-bgbtn"></div>
        <input value="Login" type="submit" class="login100-form-btn" name="submit1" style="cursor: pointer;">
    </div>
</div>
</form>
</div>
</div> 
<div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" >
    <img src="/img/cofat.png" alt="" style="width:600px; height:300px;margin-left:-80px;">
    <h1 style="font-size:30px; margin-left:-40px;">Hello admin Welcome To Cofat Inventory Mangement </h1>
    <h2 style="color: #006DFF;margin-left:-40px;">"Unis pour l'excellence, ensemble vers l'avenir"</h2>
</div> 
</section>         
@endsection

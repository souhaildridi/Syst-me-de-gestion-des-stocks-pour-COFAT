@extends('layout')
@section('content')
<div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block" >
            <div class="logo">
                <a href="">
                    <div class="sou">
                    <img src="img/logo1.png" alt="cofat" />
                    </div>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                    <li class=" has-sub">
                            <a class="js-arrow" href="{{route('indexDash')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>


                        <li class=" has-sub">
                            <a class="js-arrow" href="{{route('dashboardadmin')}}">
                            
                                <i class="fas fa-exchange-alt"></i>Transactions</a>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                            <i class="fas fa-user-shield"></i>Admins</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="">
                                <a href="{{route('ajouterAdmin')}}">
                                <i class="fas fa-plus"></i>ajouter Admin
                                </a>
                                </li>
                                <li class="">
                                    <a href="{{route('listeAdmin')}}">
                                    <i class="fas fa-clipboard-list"></i>Liste Admins
                                </a>
                                </li>
                              
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                            <i class="fas fa-box"></i>Produits</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="">
                                    <a href="{{route('ajouterProduit')}}">
                                    <i class="fas fa-plus"></i> ajouter Produit
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{route('listeProduit')}}">
                                    <i class="fas fa-clipboard-list"></i>Liste Produits
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                            <i class="fas fa-users"></i>Employé</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="">
                                    <a href="{{route('ajouterUser')}}">
                                    <i class="fas fa-plus"></i> ajouter Employé
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{route('listeUser')}}">
                                    <i class="fas fa-clipboard-list"></i>Liste Employé
                                    </a>
                                </li>
                              
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        

<!-- PAGE CONTAINER -->
<div class="page-container">
    <!-- HEADER DESKTOP -->
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <form class="form-header" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                        <select name="search_type" class="au-btn--submit" style="color:white;">
                            <option value="0">Name</option>
                            <option value="1">Email</option>
                        </select>
                        <button class="au-btn--submit" type="submit">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>
                    <div class="header-button">
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                                <div class="image">
                                    <img src="{{ asset(Auth::guard('admin')->user()->avatar_admin) }}" alt="sohail" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#">{{ Auth::guard('admin')->user()->name }}</a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="{{ asset(Auth::guard('admin')->user()->avatar_admin) }}" alt="sohail"/>
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#">{{ Auth::guard('admin')->user()->name }}</a>
                                            </h5>
                                            <span class="email">{{ Auth::guard('admin')->user()->email }}</span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="">
                                            <i class="fas fa-user-circle"></i>Account
                                        </a>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="{{ route('signout') }}">
                                            <i class="fas fa-sign-out-alt"></i>Logout
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
  
</div>
</div>
@endsection




@section('information')
@if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="main-content" style="background: #cecece; height:130%;font-weight:bold;font-family: 'Sofia Pro', sans-serif;margin-top:-30px;">
    <div class="section__content section__content--p30" style="margin-top:-70px;">
        <div class="container-fluid">
            <h2 class="title-1 m-b-25" style="color:black; font-weight:bold;"><center>Edit user</center></h2>
            
            <br><br>
            <center>
                <form enctype="multipart/form-data" action="{{ route('user.update', $user->id) }}" method="POST" style="margin-top:-50px;">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="color:black;margin-left:-325px;">Full Name</label>
                        <input type="text" required class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Full Name" value="{{$user->name}}" style="width:400px;">
                     
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="color:black;margin-left:-295px;">Email address</label>
                        <input type="email" required class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email" value="{{$user->email}}" style="width:400px;">
                       
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" style="color:black;margin-left:-290px;">Phone Number</label>
                        <input type="text" required class="form-control" name="Tel_user" id="exampleInputEmail1"  placeholder="Enter Phone Number" value="{{$user->Tel_user}}" style="width:400px;">
                       
                    </div>
                    <div class="form-group">
                     <label for="exampleInputEmail1" style="color:black;margin-left:-180px;">Department</label>
                      <select name="department" id="cars" value="{{$user->departement}}" >
                      <option value="IT">IT</option>
                      <option value="QUALITY">QUALITY</option>
                      <option value="HR">HR</option>
                      <option value="PRODUCTION">PRODUCTION</option>
                      </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1" style="color:black;margin-left:-327px;">Password</label>
                        <input type="password" required class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" value="{{$user->password}}" style="width:400px;">
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" style="color:black;margin-left:-345px;">Avatar</label><br>
                        <input required type="file" name="avatar_user" id="exampleInputPassword1" value="{{$user->avatar_user}}" style="width:400px;">
                        <img src="{{ asset($user->avatar_user) }}" >
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary" style="margin-left:40px;">Submit</button>
                    <button type="reset" class="btn btn-dark" style="margin-left:20px;"><i class="bi bi-x-square"></i> Cancel</button>
                </form>
            </center>
        </div>
    </div>
</div>
@endsection


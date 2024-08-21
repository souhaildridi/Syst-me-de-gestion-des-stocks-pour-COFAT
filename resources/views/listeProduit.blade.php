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
    <div class="main-content" style="margin-top:-30px;">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <h2 class="title-1 m-b-25" style="color:black; font-weight:bold;margin-top:-50px"><center>Liste des Produits</center> </h2>
            <center><a href="{{route('ajouterProduit') }}" class="au-btn au-btn-icon au-btn--blue"><i class="zmdi zmdi-plus"></i>add product</a></center> <br>
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Code Barre</th>
                        <th scope="col">Quantite En Stock</th>
                        <th scope="col">Reference Article</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->product_code }}</td>
                        <td>{{ $product->Quantite_En_Stock }}</td>
                        <td>{{ $product->reference_article }}</td>
                        <td>
                        <a href="{{route('editProduit',$product->id)}}" class="btn" style="background-color:#f94a00; color:white;"><i class="fas fa-edit"></i></a> 
                            
                            <form action="{{ route('produit.destroy', $product->id) }}" method="POST" type="button" onsubmit="return confirm('Delete?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" style="background-color:#f30000; color:white;">
                            <i class="fas fa-trash"></i>
                            </button>
                            </form>
                           
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>    

@endsection


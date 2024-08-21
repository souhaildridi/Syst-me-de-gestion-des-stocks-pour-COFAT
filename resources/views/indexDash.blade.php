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
                <div class="row" style="margin-top:-50px;">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">overview </h2>
                        </div>
                    </div>
                </div>

                <div class="row m-t-25">
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c1">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="fas fa-user-shield"></i>
                                    </div>
                                    <div class="text">
                                        <h2>{{ $adminsCount }}</h2>
                                        <span>Admins En Ligne</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart1"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                <i class="fas fa-archive"></i>
                                </div></br>
                                <div class="text">
                                    <h2>{{ $produitsCount }}</h2>
                                    <span>Total Produit .</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                <i class="fas fa-check"></i>
                                </div>
                                <div class="text">
                                <h2>{{$transactionsCount}}</h2>
                                    <span>Total  Mouvements </span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart3"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="text">
                                    <h2>{{$usersCount}}</h2>
                                    <span>Utilisateur En Ligne</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>  
                </div>

                <div class="row">
                    <h2 class="title-1 m-b-25">Tout Les Transaction</h2>
                    <div class="table-responsive table--no-card m-b-40">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nom Produit</th>
                                    <th>Quantite</th>
                                    <th>Emplacement</th>
                                    <th>Id Produit</th>
                                    <th>Id Utilisateur</th>
                                    <th>Date Transaction</th>
                                    <th>Reference</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                <tr>
                    <td>{{optional($transaction->product)->title }}</td>
                    <td>{{ $transaction['quantite'] }}</td>
                    <td>{{ $transaction['emplacement'] }}</td>
                    <td>{{ $transaction['id_product'] }}</td>
                    <td>{{ $transaction['id_user'] }}</td>
                    <td>{{ $transaction['date_transaction'] }}</td>
                    <td>{{ $transaction['reference_article'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nom Produit</th>
                                    <th>Quantite</th>
                                    <th>Emplacement</th>
                                    <th>Id Produit</th>
                                    <th>Id Utilisateur</th>
                                    <th>Date Transaction</th>
                                    <th>Reference</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


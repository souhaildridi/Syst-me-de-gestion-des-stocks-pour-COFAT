<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo" style="margin-left: -80px; width:400px;">
            <a href=""><img style="height: 70px; width: 100px;" src="/img/logo1.png" alt="" class="img-fluid"></a>
        </div>
        <div class="header-wrap">
            <form style="margin-right: 400px;" class="form-header" action="" method="POST">
                
                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas & reports..." />
                <select name="search_type" class="au-btn--submit" style="color:white;"> 
                    <option value="0">Name</option>
                    <option value="1">Email</option>
                    <option value="2">Phone</option>
                </select>
                <button class="au-btn--submit" type="submit">
                <i class="fas fa-search"></i>
                </button>
            </form>

            <div class="dropdown text-end" style="margin-right: -40px;">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <section style="width: 50px; height: 50px; margin-top: 20px;">

                    
                        <img  src="{{ asset(Auth::user()->avatar_user) }}" alt="mdo" class="rounded-circle">
                        

                    </section>
                </a> 
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                    <li><h6><a class="dropdown-item" href="#">{{ Auth::user()->name }}</a></h6></li>
                    <li><a class="dropdown-item" href="#">{{ Auth::user()->email }}</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('signout') }}">Logout</a></li>
                </ul>
            </div>
            <div class="b-example-divider"></div>
        </div>
    </div>
</header>

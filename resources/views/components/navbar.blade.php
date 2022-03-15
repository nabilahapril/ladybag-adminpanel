<nav class="navbar navbar-light bg-white shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <div class="row ">
                <div class="col-7">
                    <img src="ldlogo.png" style="width:190px" class="img-fluid" alt="">
                </div>
                <div class="col-2">
                    <div class="ladybag-navbar">
                    </div>
                    <div class="lady-navbar">
                    </div>
                </div>
                <div class="col-2">
                    <div class="menu-toggle text-right">
                        <button class="btn"><i class="icon-bars text-right"></i></button>
                    </div>
                </div>
            </div>
        </a>
        <div class="logout-mobile">
                <div class="dropdown">
                    <button class="btn bg-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Halo, {{ Auth::user()->name }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out"></i>  Logout
                            </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                        </form></a>
                    </div>
                </div>
            </div>
        </div>
</nav>

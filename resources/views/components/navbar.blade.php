<nav class="navbar navbar-light bg-white shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <div class="row ">
                <div class="col-2">
                    <img src="images.png" class="img-fluid" alt="">
                </div>
                <div class="col-8">
                    <div class="ladybag-navbar">
                        Ladybag
                    </div>
                    <div class="lady-navbar">
                        Admin Panel
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
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                <button class="btn btn-danger rounded shadow-md my-2 my-sm-0" type="submit">Log Out</button>
            </form>
        </div>

    </div>
</nav>

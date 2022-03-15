<div class=" text-black ">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="my-2">
            <a href="{{url('/')}}" class="nav-link text-black {{ request()->is('/') ? 'active' : '' }}" aria-current="page">
            <i class="fa fa-tachometer" aria-hidden="true"></i>
                <span class="ml-3 sidebar-text">
                    Dashboard
                </span>
            </a>
        </li>
        <li class="my-2">
            <a href="{{url('/category')}}" class="nav-link text-black {{ request()->is('category*') ? 'active' : '' }}">
            <i class="fa fa-archive"></i>
                <span class="ml-3 sidebar-text">
                   Kategori Produk
                </span>
            </a>
        </li>
        <li class="my-2">
            <a href="{{url('/product')}}" class="nav-link text-black {{ request()->is('product*') ? 'active' : '' }}">
            <i class="fa fa-shopping-bag"></i>
                <span class="ml-3 sidebar-text">
                    Produk
                </span>
            </a>
        </li>
        <li class="my-2">
            <a href="{{url('/image')}}" class="nav-link text-black {{ request()->is('image*') ? 'active' : '' }}">
            <i class="fa fa-picture-o" aria-hidden="true"></i>
                <span class="ml-3 sidebar-text">
                    Galeri Produk
                </span>
            </a>
        </li>
        <li class="my-2">
            <a href="{{url('/ongkos')}}" class="nav-link text-black  {{ request()->is('ongkos*') ? 'active' : '' }}">
            <i class="fa fa-truck" aria-hidden="true"></i>
                <span class="ml-3 sidebar-text">
                    Ongkos Kirim
                </span>
            </a>
        </li>
        <li class="my-2">
            <a href="{{url('/payments')}}" class="nav-link text-black  {{ request()->is('payments*') ? 'active' : '' }}">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span class="ml-3 sidebar-text">
                    Pesanan
                </span>
            </a>
        </li>
        <li class="my-2">
            <a href="{{url('/reports')}}" class="nav-link text-black  {{ request()->is('reports*') ? 'active' : '' }}">
            <i class="fa fa-file-text" aria-hidden="true"></i>
                <span class="ml-3 sidebar-text">
                    Laporan Pesanan
                </span>
            </a>
        </li>
        <li class="my-2 logout-sidebar">
            <a href="#" class="nav-link text-black">
                <i class="icon-sign-out signout"></i>
                <span class="ml-3 sidebar-text">
                    Log Out
                </span>
            </a>
        </li>
    </ul>
</div>

        <div class="sidebar col-auto col-md-3 col-xl-2 px-sm-2 px-0  position-fixed h-100">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-black text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Admin panel</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.customers.index') }}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Pregled korisnika</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categories.index') }}" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Pregled kategorija</span> </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="{{ route('admin.ads.index') }}" class="nav-link px-0"> <span class="d-none d-sm-inline">Pregled oglasa</span> </a>
                            </li>
                           
                        </ul>
                    </li>
                      <li class="nav-item">
                        <a href="{{ route('ads.public') }}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Stranica sa oglasima</span>
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <div class="d-flex align-items-center text-black text-decoration-none gap-2"  data-bs-toggle="dropdown" aria-expanded="false">
                            <p class="mt-3 "><strong>{{Auth::user()->name }}</strong></p>
                            <button class="btn btn-danger">Logout</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</body>
</html>

<style>

</style>
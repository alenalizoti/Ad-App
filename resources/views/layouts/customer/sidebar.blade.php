        <div class="sidebar col-auto col-md-3 col-xl-2 px-sm-2 px-0  position-fixed h-100">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{ route('customer.profile') }}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Moji oglasi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('customer.activities') }}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Istorija aktivnosti</span>
                        </a>
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
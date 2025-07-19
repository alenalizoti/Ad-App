<div class="sidebar col-auto col-md-3 col-xl-2 px-sm-2 px-0 position-fixed h-100 bg-white shadow">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-black min-vh-100">
        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-black text-decoration-none">
            <span class="fs-5 d-none d-sm-inline">Svi Oglasi</span>
        </a>
        @php
            function prikaziKategorije($categories)
            {
                echo '<ul class="nav flex-column ms-3">';
                foreach ($categories as $category) {
                    echo '<li class="nav-item">';
                    echo '<a href="' . route('category.show', $category->id) . '" class="nav-link px-0 align-middle">';
                    echo '<span class="ms-1 d-none d-sm-inline">' . $category->name . '</span>';
                    echo '</a>';
                    if (!empty($category->children) && is_countable($category->children) && count($category->children) > 0) {
                        prikaziKategorije($category->children);
                    }
                    echo '</li>';
                }
                echo '</ul>';
            }
        @endphp

        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            @foreach($categories as $category)
                <li class="nav-item w-100">
                    <a href="{{ route('category.show', $category->id) }}" class="nav-link px-0 align-middle">
                        <span class="ms-1 d-none d-sm-inline">{{ $category->name }}</span>
                    </a>
                    @if(isset($category->children) && count($category->children))
                        @php prikaziKategorije($category->children); @endphp
                    @endif
                </li>
            @endforeach
        </ul>

        <hr>

        <div class="dropdown pb-4 w-100">
            @auth
                <form action="{{ route('logout') }}" method="POST"
                    class="d-flex align-items-center justify-content-between gap-2 px-3">
                    @csrf
                    @php
                        $profileUrl = Auth::user()->role === 'admin' ? route('admin.dashboard') : route('customer.profile');
                    @endphp
                    <a href="{{ $profileUrl }}" class="mb-0"><strong>{{ Auth::user()->name }}</strong></a>
                    <button class="btn btn-danger btn-sm">Logout</button>
                </form>
            @else
                <div class="d-flex justify-content-around px-3">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-secondary btn-sm">Register</a>
                </div>
            @endauth
        </div>

    </div>
</div>
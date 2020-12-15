<li class="nav-item dropdown nav-profile">
    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="https://via.placeholder.com/30x30" alt="profile">
    </a>
    <div class="dropdown-menu" aria-labelledby="profileDropdown">
        <div class="dropdown-header d-flex flex-column align-items-center">
            <div class="figure mb-3">
                <img src="https://via.placeholder.com/80x80" alt="">
            </div>
            <div class="info text-center">
                <p class="name font-weight-bold mb-0"> {{ Auth::user()->name }}</p>
                <p class="email text-muted mb-3"> {{ Auth::user()->email }}</p>
            </div>
        </div>
        <div class="dropdown-body">
            <ul class="profile-nav p-0 pt-3">
                <li class="nav-item">
                    <a href="{{ route('account.profile') }}" class="nav-link">
                        <i data-feather="user"></i>
                        <span>{{ __('Profile')}}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('account.editprofile') }}" class="nav-link">
                        <i data-feather="edit"></i>
                        <span>{{ __('Edit Profile')}}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('account.editpassword') }}" class="nav-link">
                        <i data-feather="edit"></i>
                        <span>{{ __('Edit Password')}}</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="nav-link">
                        <i data-feather="log-out"></i>
                        <span> {{ __('Logout') }}</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </li>
            </ul>
        </div>
    </div>
</li>
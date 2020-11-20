<nav class="bottom-navbar">
    <div class="container">
        <ul class="nav page-navigation">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="menu-title">Projects</span>
                </a>
            </li>
      

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="key"></i>
                    <span class="menu-title">Keywords</span>
                    <i class="link-arrow"></i>
                </a>
                <div class="submenu">
                    <ul class="submenu-item">
                        <li class="category-heading">Managing</li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('keywords') }}">Explorer</a></li>
                        <li class="nav-item"><a class="nav-link" href="pages/email/read.html">Lists</a></li>
                        <li class="nav-item"><a class="nav-link" href="pages/email/compose.html">Groups</a></li>
                        <li class="category-heading">Analysis<li>
                        <li class="nav-item"><a class="nav-link" href="pages/apps/chat.html">Ranking</a></li>
                        <li class="nav-item"><a class="nav-link" href="pages/apps/calendar.html">Domain vs domain</a></li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
            <a class="nav-link" href="{{ route('analytics') }}">
                    <i class="link-icon" data-feather="bar-chart"></i>
                    <span class="menu-title">Analytics</span>
                </a>
            </li>

          

            <li class="nav-item">
                <a class="nav-link" href="{{ route('competitors') }}">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="menu-title">Competitors</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ranking') }}">
                    <i class="link-icon" data-feather="activity"></i>
                    <span class="menu-title">Ranking</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('audits') }}">
                    <i class="link-icon" data-feather="tool"></i>
                    <span class="menu-title">Audits</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('campaigns') }}">
                    <i class="link-icon" data-feather="globe"></i>
                    <span class="menu-title">Campaigns</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('experiments') }}">
                    <i class="link-icon" data-feather="trello"></i>
                    <span class="menu-title">Experiments</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('chat') }}">
                    <i class="link-icon" data-feather="message-circle"></i>
                    <span class="menu-title">Chat</span>
                </a>
            </li>


            @can('manage-users')
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="smile"></i>
                    <span class="menu-title">Admin</span>
                    <i class="link-arrow"></i>
                </a>
                <div class="submenu">
                    <ul class="submenu-item">
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.users.index')}}">Users</a></li>
                
                    </ul>
                </div>
            </li>
            @endcan


        </ul>
    </div>
</nav>
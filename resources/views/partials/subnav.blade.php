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
                @if(session('selected_project'))
                <a href="{{ route('keywords') }}" class="nav-link">
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
                        <li class="nav-item"><a class="nav-link" href="{{ route('ranking') }}">Ranking</a></li>
                        <li class="nav-item"><a class="nav-link" href="pages/apps/calendar.html">Domain vs domain</a></li>
                    </ul>
                </div>
                @endif
            </li>
            
            <li class="nav-item">
                @if(session('selected_project'))
                <a href="{{ route('analysis') }}" class="nav-link">
                    <i class="link-icon" data-feather="bar-chart"></i>
                    <span class="menu-title">Analysis</span>
                    <i class="link-arrow"></i>
                </a>
                <div class="submenu">
                    <ul class="submenu-item">
                        <li class="category-heading">Analysis</li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('analysis.pages') }}">Pages</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('analysis.channels') }}">Channels</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('analysis.segments') }}">Segments</a></li>
                        <li class="category-heading">Managing<li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('analysis.upload') }}">Upload</a></li>
                    </ul>
                </div>
                @endif
            </li>

            <li class="nav-item">
                @if(session('selected_project'))
                <a class="nav-link" href="{{ route('audits') }}">
                    <i class="link-icon" data-feather="tool"></i>
                    <span class="menu-title">Technical</span>
                </a>
                @endif
            </li>

            <li class="nav-item">
                @if(session('selected_project'))
                <a class="nav-link" href="{{ route('competitors') }}">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="menu-title">Competitors</span>
                </a>
                @endif
            </li>
           
            
            <li class="nav-item">
                @if(session('selected_project'))
                <a href="{{ route('campaigns') }}" class="nav-link">
                    <i class="link-icon" data-feather="globe"></i>
                    <span class="menu-title">Campaigns</span>
                    <i class="link-arrow"></i>
                </a>
                <div class="submenu">
                    <ul class="submenu-item">
                        <li class="category-heading">Campaign Management</li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('campaigns') }}">All Campaigns</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('campaigns.links') }}">All Links</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('campaigns.templates')}}">Templates</a></li>
                        <li class="category-heading">Campaign Settings<li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('campaigns.categories') }}">Categories</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('campaigns.sources') }}">Sources</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('campaigns.mediums') }}">Mediums</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('campaigns.contents') }}">Contents</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('campaigns.terms') }}">Terms</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('campaigns.custom_parameters') }}">Custom Parameters</a></li>
                    </ul>
                </div>
                @endif
            </li>

            <li class="nav-item">
                @if(session('selected_project'))
                <a class="nav-link" href="{{ route('experiments') }}">
                    <i class="link-icon" data-feather="trello"></i>
                    <span class="menu-title">Experiments</span>
                </a>
                @endif
            </li>
         

            <li class="nav-item">
                @if(session('selected_project'))
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="settings"></i>
                    <span class="menu-title">Project</span>
                    <i class="link-arrow"></i>
                </a>
                <div class="submenu">
                    <ul class="submenu-item">
                        <li class="category-heading">Project Management</li>
                        <li class="nav-item"><a class="nav-link" href="project-user-management">User Management</a></li>
                        <li class="nav-item"><a class="nav-link" href="pages/email/read.html">Notifications</a></li>
                        <li class="nav-item"><a class="nav-link" href="pages/email/compose.html">Search settings</a></li>
                        <li class="category-heading">Community<li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('chat') }}">Chat</a></li>
                    </ul>
                </div>
                @endif
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
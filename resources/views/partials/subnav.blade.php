<nav class="bottom-navbar">
    <div class="container">
        <ul class="nav page-navigation">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="menu-title">{{__('Projects')}}</span>
                </a>
            </li>  
         
            @can('manage-keywords')
            <li class="nav-item">
                @if(session('selected_project'))
                <a href="{{ route('keywords') }}" class="nav-link">
                    <i class="link-icon" data-feather="key"></i>
                    <span class="menu-title">{{__('Keywords')}}</span>
                    <i class="link-arrow"></i>
                </a>
                <div class="submenu">
                    <ul class="submenu-item">
                        <li class="category-heading">{{__('Managing')}}</li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('keywords') }}">{{__('Explorer')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="pages/email/read.html">{{__('Lists')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="pages/email/compose.html">{{__('Groups')}}</a></li>
                        <li class="category-heading">{{__('Analysis')}}<li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('ranking') }}">{{__('Ranking')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="pages/apps/calendar.html">{{__('Domain vs domain')}}</a></li>
                    </ul>
                </div>
                @endif
            </li>
            @endcan
            
            @can('manage-analysis')
            <li class="nav-item">
                @if(session('selected_project'))
                <a href="{{ route('analysis') }}" class="nav-link">
                    <i class="link-icon" data-feather="bar-chart"></i>
                    <span class="menu-title">{{__('Analysis')}}</span>
                    <i class="link-arrow"></i>
                </a>
                <div class="submenu">
                    <ul class="submenu-item">
                        <li class="category-heading">{{__('Analysis')}}</li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('analysis') }}">{{__('All Analyses')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('analysis.pages') }}">{{__('Pages')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('analysis.channels') }}">{{__('Channels')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('analysis.segments') }}">{{__('Segments')}}</a></li>
                        <li class="category-heading">{{_('Managing')}}<li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('analysis.upload') }}">{{__('Upload')}}</a></li>
                    </ul>
                </div>
                @endif
            </li>
            @endcan

            @can('manage-technical')
            <li class="nav-item">
                @if(session('selected_project'))
                <a class="nav-link" href="{{ route('audits') }}">
                    <i class="link-icon" data-feather="tool"></i>
                    <span class="menu-title">{{__('Technical')}}</span>
                </a>
                @endif
            </li>
            @endcan

            @can('manage-competitors')
            <li class="nav-item">
                @if(session('selected_project'))
                <a class="nav-link" href="{{ route('competitors') }}">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="menu-title">{{__('Competitors')}}</span>
                </a>
                @endif
            </li>
            @endcan
           
            @can('manage-campaigns')
            <li class="nav-item">
                @if(session('selected_project'))
                <a href="{{ route('campaigns') }}" class="nav-link">
                    <i class="link-icon" data-feather="globe"></i>
                    <span class="menu-title">{{__('Campaigns')}}</span>
                    <i class="link-arrow"></i>
                </a>
                <div class="submenu">
                    <ul class="submenu-item">
                        <li class="category-heading">{{__('Campaign Management')}}</li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('campaigns') }}">{{__('All Campaigns')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('campaigns.links') }}">{{__('All Links')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('campaigns.templates')}}">{{__('Templates')}}</a></li>
                        <li class="category-heading">{{__('Campaign Settings')}}<li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('campaigns.categories') }}">{{__('Categories')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('campaigns.sources') }}">{{_('Sources')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('campaigns.mediums') }}">{{__('Mediums')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('campaigns.contents') }}">{{__('Contents')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('campaigns.terms') }}">{{__('Terms')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('campaigns.custom_parameters') }}">{{__('Custom Parameters')}}</a></li>
                    </ul>
                </div>
                @endif
            </li>
            @endcan

            @can('manage-experiments')
            <li class="nav-item">
                @if(session('selected_project'))
                <a class="nav-link" href="{{ route('experiments') }}">
                    <i class="link-icon" data-feather="trello"></i>
                    <span class="menu-title">{{__('Experiments')}}</span>
                </a>
                @endif
            </li>
            @endcan
         

           
            <li class="nav-item">
                @if(session('selected_project'))
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="settings"></i>
                    <span class="menu-title">{{__('Project')}}</span>
                    <i class="link-arrow"></i>
                </a>
                <div class="submenu">
                    <ul class="submenu-item">
                        <li class="category-heading">{{__('Project Management')}}</li>
                        <li class="nav-item"><a class="nav-link" href="project-user-management">{{__('User Management')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="pages/email/read.html">{{__('Notifications')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="pages/email/compose.html">{{__('Search settings')}}</a></li>
                        <li class="category-heading">{{__('Community')}}<li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('chat') }}">{{__('Chat')}}</a></li>
                    </ul>
                </div>
                @endif
            </li>
        
         


            @can('manage-users')
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="smile"></i>
                    <span class="menu-title">{{__('Admin')}}</span>
                    <i class="link-arrow"></i>
                </a>
                <div class="submenu">
                    <ul class="submenu-item">
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.users.index')}}">{{__('Users')}}</a></li>
                
                    </ul>
                </div>
            </li>
            @endcan


        </ul>
    </div>
</nav>
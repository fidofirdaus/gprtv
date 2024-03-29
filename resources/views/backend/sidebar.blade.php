<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile" style="background: url(/assets/images/background/user-info.jpg) no-repeat;">
            <!-- User profile image -->
            <div class="profile-img"> <img src="{{ asset('assets/images/users/1.jpg') }}" alt="user" /> </div>
            <!-- User profile text-->
            <div class="profile-text"> <a href="#" class="dropdown-toggle link u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <span class="caret"></span></a>
                <div class="dropdown-menu animated flipInY">
                    {{-- <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                    <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                    <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a> --}}
                    <div class="dropdown-divider"></div> 
                    {{-- <a href="login.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a> --}}
                    <a href="{{ route('logout') }}" class="dropdown-item" 
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>
                            {{ __('Logout') }}
                    </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    
                </div>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">FITUR</li>
                <li>
                    <a href="{{ URL('/admin') }}" aria-expanded="false"><i class="fa fa-home"></i><span class="hide-menu">Dashboard</span></a>
                </li>    
                <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-cog"></i><span class="hide-menu">Master Data</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('category.index') }}">Kategori</a></li>
                        <li><a href="{{ route('tag.index') }}">Tag</a></li>
                        <li><a href="{{ route('instansi.index') }}">Instansi</a></li>
                    </ul>
                </li>
                {{-- <li>
                    <a href="{{ route('video.index') }}" aria-expanded="false"><i class="fa fa-youtube"></i><span class="hide-menu">Video Youtube</span></a>
                </li> --}}
                <li>
                    <a href="{{ route('video.index') }}" aria-expanded="false"><i class="fa fa-play"></i><span class="hide-menu">Video</span></a>
                </li>
                <li>
                    <a href="{{ route('jadwal.index') }}" aria-expanded="false"><i class="fa fa-clock-o"></i><span class="hide-menu">Jadwal Acara</span></a>
                </li>
                <li>
                    <a href="{{ route('headline.index') }}" aria-expanded="false"><i class="fa fa-pencil"></i><span class="hide-menu">Teks Headline</span></a>
                </li>
                <li>
                    <a href="{{ route('tayang.index') }}" aria-expanded="false"><i class="fa fa-pencil"></i><span class="hide-menu">Acara sedang Tayang</span></a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item-->
        {{-- <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a> --}}
        <!-- item-->
        {{-- <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a> --}}
        <!-- item-->
        {{-- <a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> --}}
        <a href="{{ route('logout') }}" class="link" data-toggle="tooltip" title="Logout" 
            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="mdi mdi-power"></i>
        </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
    </div>
    <!-- End Bottom points-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
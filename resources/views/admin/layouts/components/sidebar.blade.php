<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="typcn typcn-device-desktop menu-icon"></i>
                <span class="menu-title">Dashboard</span>
                {{-- <div class="badge badge-danger">new</div> --}}
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{route('categories.index')}}"
        aria-controls="ui-basic">
        <i class="typcn typcn-document-text menu-icon"></i>
        <span class="menu-title">Category</span>
        </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('subcategories.index')}}" aria-controls="form-elements">
                <i class="typcn typcn-film menu-icon"></i>
                <span class="menu-title">Sub Category</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#charts" aria-controls="charts">
                <i class="typcn typcn-chart-pie-outline menu-icon"></i>
                <span class="menu-title">Activities</span>
            </a>
        </li> --}}

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <i class="typcn typcn-compass menu-icon"></i>
                <span class="menu-title">Activities</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('categories.index') }}">Category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('subcategories.index') }}">Sub Category</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('activities.index') }}">Activity</a></li>
                    <!-- <li class="nav-item"> <a class="nav-link" href="{{ route('otherexperiances.index') }}">Experiances</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('mostpopularactivities.index') }}">Most Popular Activities</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('homeactivities.index') }}">Home Activity</a></li> -->
                </ul>
            </div>

        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings">
                <i class="typcn typcn-cog-outline menu-icon"></i>
                <span class="menu-title">Setting</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="settings">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('menus.index') }}">Menus</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('setting.contact.index') }}">Contact-Us</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('setting.find.index') }}">Find-Us</a>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('guidelines.index') }}">Guidelines
                            Image</a>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('termsconditions.index') }}">Terms &
                            Condition Image</a>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('privacypolicy.index') }}">Privacy Policy
                            Image</a>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('homeimages.index') }}">Home Image</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('aboutimages.index') }}">About-Us
                            Image</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('blogPage.index') }}">Blog Page
                            Image</a>
                    </li>
                </ul>
            </div>

        </li>
        {{--  <li class="nav-item">
            <a class="nav-link" href="{{route('packages.index')}}" aria-controls="tables">
                <i class="typcn typcn-th-small-outline menu-icon"></i>
                <span class="menu-title">Packages</span>
            </a>
        </li>  --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('blogs.index') }}" aria-controls="tables">
                <i class="typcn typcn-document-text menu-icon"></i>
                <span class="menu-title">Blogs</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.bookings') }}" aria-controls="tables">
                <i class="typcn typcn-bookmark menu-icon"></i>
                <span class="menu-title">Bookings</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.couponIndex') }}" aria-controls="tables">
                <i class="typcn typcn-tag menu-icon"></i>
                <span class="menu-title">Coupon</span>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false"
                aria-controls="auth">
                <i class="typcn typcn-user-add-outline menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register
                        </a></li>
                </ul>
            </div>
        </li> --}}
        {{-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false"
                aria-controls="error">
                <i class="typcn typcn-globe-outline menu-icon"></i>
                <span class="menu-title">Error pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
                    </li>
                </ul>
            </div>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.contact_us') }}" aria-controls="form-elements">
                <i class="typcn typcn-film menu-icon"></i>
                <span class="menu-title">Contact</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reviews.index') }}" aria-controls="form-elements">
                <i class="typcn typcn-film menu-icon"></i>
                <span class="menu-title">Reviews</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.logout') }}">
                <i class="typcn typcn-mortar-board menu-icon"></i>
                <span class="menu-title">Logout</span>
            </a>
        </li>

    </ul>
</nav>

@php
    $user = Auth::user();
@endphp
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="border-bottom:white;">
    <div class="navbar-brand-wrapper d-flex justify-content-center bg-white">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
            <a class="navbar-brand brand-logo" href="{{ route('admin.dashboard') }}"><img src="{{ asset('logo.png') }}"
                    alt="logo" / style="height:100%"></a>
            <a class="navbar-brand brand-logo-mini" href="{{ route('admin.dashboard') }}"><img
                    src="{{ asset('admin/images/logo-mini.svg') }}" alt="logo" /></a>
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="typcn typcn-th-menu"></span>
            </button>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
                    @if (auth()->user()->profile_image_url)
                        <img src="{{ auth()->user()->profile_image_url }}" alt="profile" />
                    @else
                        <img src="{{ asset('avatar.jpeg') }}" alt="profile" />
                    @endif
                    <span class="nav-profile-name lead">{{ $user->first_name }}{{ $user->last_name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="{{ route('admin.profile') }}">
                        <i class="typcn typcn-cog-outline text-primary"></i>
                        Settings
                    </a>
                    <a class="dropdown-item" href="{{ route('admin.changePassword') }}">
                        <!-- Replace the icon with the desired one -->
                        <i class="typcn typcn-key text-primary"></i>
                        Change Password
                    </a>
                    <a class="dropdown-item" href="{{ route('admin.logout') }}">
                        <i class="typcn typcn-eject text-primary"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-date dropdown">
                <a class="nav-link d-flex justify-content-center align-items-center" href="javascript:;">
                    <h6 class="date mb-0">Today : {{ \Carbon\Carbon::now()->format('M d') }}</h6>
                    <i class="typcn typcn-calendar"></i>
                </a>
            </li>


        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="typcn typcn-th-menu"></span>
        </button>
    </div>
</nav>
<!-- partial -->
<nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
    <div class="navbar-links-wrapper d-flex align-items-stretch">

    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
            <li class="nav-item ml-0">
                <h4 class="mb-0">Dashboard</h4>
            </li>
            <li class="nav-item">
                <div class="d-flex align-items-baseline">
                    <p class="mb-0">Home</p>
                    <i class="typcn typcn-chevron-right"></i>
                    <p class="mb-0">Main Dahboard</p>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">

        </ul>
    </div>
</nav>

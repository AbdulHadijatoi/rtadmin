@extends('admin.layouts.main')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="page-title">Dashboard Overview</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 stretch-card mt-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="mb-3">Number of Users</p>
                                    <h3>{{ $users }}</h3>
                                </div>
                                <i class="typcn typcn-group icon-xl text-secondary"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 stretch-card mt-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="mb-3">Number of Activities</p>
                                    <h3>{{ $activities }}</h3>
                                </div>
                                <i class="typcn typcn-star-outline icon-xl text-secondary"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 stretch-card mt-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="mb-3">Number of Bookings</p>
                                    <h3>{{ $bookings }}</h3>
                                </div>
                                <i class="typcn typcn-ticket icon-xl text-secondary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
                            2020 <a href="https://www.bootstrapdash.com/" class="text-muted"
                                target="_blank">Bootstrapdash</a>. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center text-muted">Free
                            <a href="https://www.bootstrapdash.com/" class="text-muted" target="_blank">Bootstrap
                                dashboard</a> templates from Bootstrapdash.com</span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection

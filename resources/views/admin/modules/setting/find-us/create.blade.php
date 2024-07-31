@extends('admin.layouts.main')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-10 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Details</h4>

                            <form class="forms-sample" action="{{ route('setting.find.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @displayErrors

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="header_image">Header Image</label>
                                    <input type="file" class="form-control @error('header_image') is-invalid @enderror"
                                        name="header_image">
                                    @error('header_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        id="phone" placeholder="Phone" name="phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" placeholder="Email" name="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="whatsapp">WhatsApp</label>
                                    <input type="text" class="form-control @error('whatsapp') is-invalid @enderror"
                                        id="whatsapp" placeholder="WhatsApp" name="whatsapp">
                                    @error('whatsapp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        id="address" placeholder="Address" name="address">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="time_zone">Time Zone</label>
                                    <input type="text" class="form-control @error('time_zone') is-invalid @enderror"
                                        id="time_zone" placeholder="Time Zone" name="time_zone">
                                    @error('time_zone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="booking_email">Booking Email</label>
                                    <input type="email" class="form-control @error('booking_email') is-invalid @enderror"
                                        id="booking_email" placeholder="Booking Email" name="booking_email">
                                    @error('booking_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="business_email">Business Email</label>
                                    <input type="email" class="form-control @error('business_email') is-invalid @enderror"
                                        id="business_email" placeholder="Business Email" name="business_email">
                                    @error('business_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="press_email">Press Email</label>
                                    <input type="email" class="form-control @error('press_email') is-invalid @enderror"
                                        id="press_email" placeholder="Press Email" name="press_email">
                                    @error('press_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="general_email">General Email</label>
                                    <input type="email"
                                        class="form-control @error('general_email') is-invalid @enderror"
                                        id="general_email" placeholder="General Email" name="general_email">
                                    @error('general_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary mr-2 mt-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

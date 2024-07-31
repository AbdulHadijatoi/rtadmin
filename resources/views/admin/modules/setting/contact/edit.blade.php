@extends('admin.layouts.main')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-10 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Contact Details</h4>

                            <form class="forms-sample" action="{{ route('setting.contact.update', $data->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @displayErrors
                                <div class="form-group">
                                    <label for="exampleInputPhone">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        id="exampleInputPhone" placeholder="Phone" name="phone"
                                        value="{{ old('phone', $data->phone) }}">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="exampleInputEmail" placeholder="Email" name="email"
                                        value="{{ old('email', $data->email) }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputAddress">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        id="exampleInputAddress" placeholder="Address" name="address"
                                        value="{{ old('address', $data->address) }}">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFacebook">Facebook Link</label>
                                    <input type="text" class="form-control @error('facebook') is-invalid @enderror"
                                        id="exampleInputFacebook" placeholder="Facebook" name="facebook"
                                        value="{{ old('facebook', $data->facebook) }}">
                                    @error('facebook')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputInstagram">Instagram Link</label>
                                    <input type="text" class="form-control @error('instagram') is-invalid @enderror"
                                        id="exampleInputInstagram" placeholder="Instagram" name="instagram"
                                        value="{{ old('instagram', $data->instagram) }}">
                                    @error('instagram')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputTwitter">Twitter Link</label>
                                    <input type="text" class="form-control @error('twitter') is-invalid @enderror"
                                        id="exampleInputTwitter" placeholder="Twitter" name="twitter"
                                        value="{{ old('twitter', $data->twitter) }}">
                                    @error('twitter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Previous Image: </label><br>
                                    <img src="{{ asset($data->image) }}" alt="Image" class="img-fluid mb-3"
                                        width="100">
                                </div>

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
                                <button type="submit" class="btn btn-primary mr-2 mt-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

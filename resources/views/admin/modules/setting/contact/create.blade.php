@extends('admin.layouts.main')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-10 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Details</h4>

                            <form class="forms-sample" action="{{ route('setting.contact.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @displayErrors
                                <div class="form-group">
                                    <label for="exampleInputName1">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        id="exampleInputName1" placeholder="Phone" name="phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="exampleInputName1" placeholder="Email" name="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        id="exampleInputName1" placeholder="Address" name="address">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Facebook Link</label>
                                    <input type="text" class="form-control @error('facebook') is-invalid @enderror"
                                        id="exampleInputName1" placeholder="Facebook" name="facebook">
                                    @error('facebook')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Instagram Link</label>
                                    <input type="text" class="form-control @error('instagram') is-invalid @enderror"
                                        id="exampleInputName1" placeholder="Instagram" name="instagram">
                                    @error('instagram')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Twitter Link</label>
                                    <input type="text" class="form-control @error('twitter') is-invalid @enderror"
                                        id="exampleInputName1" placeholder="Twitter" name="twitter">
                                    @error('twitter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image" required>
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

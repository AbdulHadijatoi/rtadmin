@extends('admin.layouts.main')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-10 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Category</h4>
                            @if (Session::get('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            <form class="forms-sample" action="{{ route('categories.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @displayErrors

                                <div class="form-group">
                                    <label for="exampleInputName1">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="exampleInputName1" placeholder="Name" name="name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <h3 class="lead">Image</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="mx-auto avatar-xl">
                                                <input type="file" class="custom-file-input form-control-file"
                                                    id="image" name="image" accept="image/png, image/jpeg, image/gif"
                                                    required>
                                                <label class="custom-file-label" for="image">Choose file...</label>
                                                @error('image')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
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

@extends('admin.layouts.main')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-10 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add About Image</h4>
                            @if (Session::get('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            <form class="forms-sample" action="{{ route('aboutimages.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @displayErrors
                                <div class="mb-2">
                                    <label for="image">Select Banner Image</label>
                                    <input type="file" class="form-control" name="image" id="image" required>
                                    <label for="header_image">Select Header Image</label>
                                    <input type="file" class="form-control" name="header_image" id="header_image"
                                        required>
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

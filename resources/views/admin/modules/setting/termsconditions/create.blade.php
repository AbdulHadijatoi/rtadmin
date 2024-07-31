@extends('admin.layouts.main')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-10 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Terms & Conditions Image</h4>
                            @if (Session::get('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            <form class="forms-sample" action="{{ route('termsconditions.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @displayErrors
                                <div class="mb-2">
                                    <label for="image">Select Banner Image</label>
                                    <input type="file" class="form-control" name="image" id="image" required>
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

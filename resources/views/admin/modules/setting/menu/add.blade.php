@extends('admin.layouts.main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Menu</h4>
                        @if(Session::get('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                        @endif
                        <form class="forms-sample" action="{{ route('menus.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @displayErrors

                            <!-- Name Field -->
                            <div class="mb-2">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
                            </div>

                            <!-- Link Field -->
                            <div class="mb-2">
                                <label for="link">Link</label>
                                <input type="url" class="form-control" name="link" placeholder="Enter Link" id="link" required>
                            </div>

                            <!-- Status Field -->
                            <div class="mb-2">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
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

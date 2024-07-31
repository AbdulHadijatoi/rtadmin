@extends('admin.layouts.main')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-10 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update Menu</h4>
                            @if (Session::get('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            <form class="forms-sample" action="{{ route('menus.update', $menu->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                @displayErrors

                                <!-- Name Field -->
                                {{--  <div class="mb-2">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" value="{{$menu->name}}" id="name" placeholder="Enter Name" required>
                            </div>  --}}

                                @if ($menu->route != '/home')
                                    <!-- Route Field -->
                                    <div class="mb-2">
                                        <label for="route">Route</label>
                                        <input type="text" class="form-control" name="route"
                                            value="{{ $menu->route }}" placeholder="Enter Route" id="route" required>
                                    </div>
                                @endif

                                <!-- Page Title Field -->
                                <div class="mb-2">
                                    <label for="page_title">Page Title</label>
                                    <input type="text" class="form-control" name="page_title"
                                        value="{{ $menu->page_title }}" placeholder="Enter Page Title" id="page_title"
                                        required>
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

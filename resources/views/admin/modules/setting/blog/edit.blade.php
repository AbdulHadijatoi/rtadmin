@extends('admin.layouts.main')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-10 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update Image</h4>
                            @displayErrors
                            <form class="forms-sample" action="{{ route('blogPage.update', $data->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="mb-2">
                                    <label for="banner_image">Select Banner Image</label>
                                    <input type="file" class="form-control mb-2 " name="image" id="image">
                                    <img src="{{ $data->image }}" width="60px" height="60px" alt="">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

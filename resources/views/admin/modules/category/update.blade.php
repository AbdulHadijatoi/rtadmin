@extends('admin.layouts.main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Category</h4>
                        @displayErrors
                        <form class="forms-sample" action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="name"
                                    placeholder="enter name" value="{{$category->name}}" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Image</label>
                                <input type="file" class="form-control" id="exampleInputUsername1" name="image"
                                    value="{{$category->image}}">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                <img src="{{$category->image}}" height="200">
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

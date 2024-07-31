@extends('admin.layouts.main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Edit Content</h1>
                        <form action="{{ route('contents.update', $content->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $content->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $content->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @if ($content->image)
                                <div class="mt-2">
                                    <img src="{{ asset($content->image) }}" alt="Content Image" style="width: 100px; height: auto;">
                                </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Update Content</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

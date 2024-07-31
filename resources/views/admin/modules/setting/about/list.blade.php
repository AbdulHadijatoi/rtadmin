@extends('admin.layouts.main')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title">About Image</h1>
                            @if ($homeimages->isEmpty())
                                <a href="{{ route('aboutimages.create') }}"
                                    class="btn btn-primary btn-rounded btn-fw float-right mb-2">Add New</a>
                            @endif
                            <div class="row justify-content-center">
                                @forelse($homeimages as $image)
                                    <div class="col-md-6 mb-4">
                                        <div class="card shadow">
                                            <h4 class="text-center">Header Image</h4>
                                            <hr>
                                            <img class="card-img-top" src="{{ $image->header_image_url }}"
                                                alt="{{ $image->id }}" width="100" height="100">

                                            <h4 class="text-center mt-3">Banner Image</h4>
                                            <hr>
                                            <img class="card-img-top" src="{{ $image->image_url }}"
                                                alt="{{ $image->id }}" width="100" height="100">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="text-center">
                                                            <a href="{{ route('aboutimages.edit', $image->id) }}"
                                                                class="btn btn-primary btn-icon-text">Edit</a>
                                                            <a href="{{ route('aboutimages.show', $image->id) }}"
                                                                class="btn btn-danger btn-icon-text">delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <p class="text-center">No images found</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

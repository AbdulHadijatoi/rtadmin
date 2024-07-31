@extends('admin.layouts.main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Blogs</h1>
                        <a href="{{ route('blogs.create') }}" class="btn btn-primary btn-rounded btn-fw float-right mb-2">Add New</a>
                        <div class="table-responsive">

                           @displayErrors
                            <table id="dataTable" class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Banner Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($blogs as $blog)
                                    <tr>
                                        <td>{{ $blog->id }}</td>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ Str::limit($blog->description, 50) }}</td>
                                        <td>
                                            @if($blog->banner_image)
                                            <img src="{{ asset($blog->banner_image) }}" alt="Banner Image" style="width: 50px; height: 50px;">
                                            @else
                                            No Image
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="actionDropdown" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="actionDropdown">
                                                    <a class="dropdown-item bg-primary text-white" href="{{ route('blogs.edit', $blog->id) }}">Edit</a>
                                                    <a class="dropdown-item bg-danger text-white"
                                                        href="{{ route('blogs.destroy', $blog->id) }}"
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this blog?')) document.getElementById('delete-form-{{ $blog->id }}').submit();">Delete</a>
                                                    <form id="delete-form-{{ $blog->id }}"
                                                        action="{{ route('blogs.destroy', $blog->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <a class="dropdown-item" href="{{ route('blogs.contents', $blog->id) }}">View Contents</a>
                                                    <a class="dropdown-item" href="{{ route('blogs.faqs', $blog->id) }}">View FAQs</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5">No blogs found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

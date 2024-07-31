@extends('admin.layouts.main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Contents of {{ $blog->title }}</h1>
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Actions</th> <!-- New column for actions -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blog->contents as $content)
                                    <tr>
                                        <td>{{ $content->title }}</td>
                                        <td class="description-text">{{ $content->description }}</td>
                                        <td>
                                            @if($content->image)
                                            <img src="{{ asset($content->image) }}" alt="Content Image" style="width: 50px; height: 50px;">
                                            @else
                                            No Image
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('contents.edit', $content->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('contents.destroy', $content->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this content?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{ route('blogs.index') }}" class="btn btn-primary mt-2">Back to Blogs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Function to convert URLs in text to clickable links
    function convertURLsToLinks(text) {
        // Regular expression to match URLs
        var urlRegex = /(https?:\/\/[^\s]+)/g;
        // Replace URLs with anchor elements
        return text.replace(urlRegex, function(url) {
            return '<a href="' + url + '" target="_blank">' + url + '</a>';
        });
    }

    // Call the function when the page is loaded
    document.addEventListener('DOMContentLoaded', function () {
        // Get all elements containing the description text
        var descriptionElements = document.querySelectorAll('.description-text');

        // Loop through each element and convert URLs to clickable links
        descriptionElements.forEach(function(element) {
            element.innerHTML = convertURLsToLinks(element.innerHTML);
        });
    });
</script>
@endsection

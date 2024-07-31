@extends('admin.layouts.main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">FAQs of {{ $blog->title }}</h1>
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blog->faqs as $faq)
                                    <tr>
                                        <td>{{ $faq->question }}</td>
                                        <td>{{ $faq->answer }}</td>
                                        <td>
                                            <a href="{{ route('faqs.edit', $faq->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('faqs.destroy', $faq->id) }}" method="post" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this FAQ?')">Delete</button>
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
@endsection

@extends('admin.layouts.main')
@section('content')
@push('css')
@include('admin.layouts.components.filepond.css')
@endpush

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Blog</h4>
                    <form class="forms-sample" action="{{ route('blogs.update', $blog->id) }}" method="post"
                        id="blog-form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Title and Description fields -->
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" rows="6" cols="50" id="editor5" name="description" rows="5" required>{{ $blog->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="banner_image">Banner Image</label>
                            <input type="file" class="form-control-file mb-2" id="banner_image" name="banner_image">
                            @if ($blog->banner_image)
                            <img src="{{ asset($blog->banner_image) }}" alt="Banner Image" style="width: 200px; height: auto;">
                            @else
                            <p>No banner image uploaded.</p>
                            @endif
                        </div>

                        <!-- Contents -->
                        <div class="form-group">
                            <h4>Contents</h4>
                            <div id="contents">
                                <!-- Existing content items will be appended here -->
                            </div>
                            <button type="button" class="btn btn-success mt-2" id="add-content">Add Content</button>
                        </div>

                        <!-- FAQs -->
                        <div class="form-group">
                            <h4>FAQs</h4>
                            <div id="faqs">
                                <!-- Existing FAQ items will be appended here -->
                            </div>
                            <button type="button" class="btn btn-success" id="add-faq">Add FAQ</button>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Blog</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let contentIndex = 0;
        let faqIndex = 0;

        document.getElementById('add-content').addEventListener('click', function () {
            const contentGroup = document.createElement('div');
            contentGroup.classList.add('content-group');
            contentGroup.innerHTML = `
                <div class="form-group">
                    <label for="content_titles[]">Content Title</label>
                    <input type="text" class="form-control" name="content_titles[]" required>
                </div>
                <div class="form-group">
                    <label for="content_descriptions[]">Content Description</label>
                    <textarea class="form-control" rows="6" cols="50" id="editor6" name="content_descriptions[]" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="content_images[]">Content Image</label>
                    <input type="file" class="form-control" name="content_images[]" accept="image/*" required>

                </div>
            `;
            document.getElementById('contents').appendChild(contentGroup);
            contentIndex++;
        });

        document.getElementById('add-faq').addEventListener('click', function () {
            const faqGroup = document.createElement('div');
            faqGroup.classList.add('faq-group');
            faqGroup.innerHTML = `
                <div class="form-group">
                    <label for="faqs[${faqIndex}][question]">Question</label>
                    <input type="text" class="form-control" name="faqs[${faqIndex}][question]" required>
                </div>
                <div class="form-group">
                    <label for="faqs[${faqIndex}][answer]">Answer</label>
                    <textarea class="form-control" name="faqs[${faqIndex}][answer]" rows="3" required></textarea>
                </div>
            `;
            document.getElementById('faqs').appendChild(faqGroup);
            faqIndex++;
        });
    });
</script>

@endsection

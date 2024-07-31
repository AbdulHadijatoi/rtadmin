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
                    <h4 class="card-title">Add Blog</h4>
                    <form class="forms-sample" action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Title">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Description"></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="banner_image">Banner Image</label>
                            <input type="file" class="form-control @error('banner_image') is-invalid @enderror" id="banner_image" name="banner_image">
                            @error('banner_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><hr>

                        <h3>Blog Contents</h3>
                        <div id="contents">
                            <div class="content-group">
                                <div class="form-group">
                                    <label for="contents[0][title]">Content Title</label>
                                    <input type="text" class="form-control" name="contents[0][title]" required>
                                </div>
                                <div class="form-group">
                                    <label for="contents[0][description]">Content Description</label>
                                    <textarea class="form-control" name="contents[0][description]" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="contents[0][image]">Content Image</label>
                                    <input type="file" class="form-control" name="contents[0][image]">
                                </div>
                            </div>
                        </div>
                        <button type="button" id="add-content" class="btn btn-secondary mb-2">Add Blog Content</button><hr>

                        <h3>FAQs</h3>
                        <div id="faqs">
                            <div class="faq-group">
                                <div class="form-group">
                                    <label for="faqs[0][question]">Question</label>
                                    <input type="text" class="form-control" name="faqs[0][question]" required>
                                </div>
                                <div class="form-group">
                                    <label for="faqs[0][answer]">Answer</label>
                                    <textarea class="form-control" name="faqs[0][answer]" required></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="button" id="add-faq" class="btn btn-secondary mb-2">Add FAQ</button><br>

                        <button type="submit" class="btn btn-primary mr-2 form-control">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let contentIndex = 1;
        let faqIndex = 1;

        document.getElementById('add-content').addEventListener('click', function () {
            const contentGroup = document.createElement('div');
            contentGroup.classList.add('content-group');

            contentGroup.innerHTML = `
                <div class="form-group">
                    <label for="contents[${contentIndex}][title]">Content Title</label>
                    <input type="text" class="form-control" name="contents[${contentIndex}][title]" required>
                </div>
                <div class="form-group">
                    <label for="contents[${contentIndex}][description]">Content Description</label>
                    <textarea class="form-control" name="contents[${contentIndex}][description]"  required></textarea>
                </div>
                <div class="form-group">
                    <label for="contents[${contentIndex}][image]">Content Image</label>
                    <input type="file" class="form-control" name="contents[${contentIndex}][image]">
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
                    <textarea class="form-control" name="faqs[${faqIndex}][answer]" required></textarea>
                </div>
            `;
            document.getElementById('faqs').appendChild(faqGroup);
            faqIndex++;
        });
    });


</script>
<script>
    const inputElement = document.querySelector('input[name="banner_image"]');
    const pond = FilePond.create(
      document.querySelector('.filepond-input-circle'), {
        labelIdle: 'Drag & Drop your picture or <span class="filepond--label-action">Browse</span>',
        styleLoadIndicatorPosition: 'center bottom',
        styleProgressIndicatorPosition: 'right bottom',
        styleButtonRemoveItemPosition: 'left bottom',
        styleButtonProcessItemPosition: 'right bottom',
        allowMultiple: false
      }
    );
</script>




@endsection

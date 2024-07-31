@extends('admin.layouts.main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Edit FAQ</h1>
                        <form action="{{ route('faqs.update', $faq->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="question">Question</label>
                                <input type="text" class="form-control" id="question" name="question" value="{{ $faq->question }}" required>
                            </div>
                            <div class="form-group">
                                <label for="answer">Answer</label>
                                <textarea class="form-control" id="answer" name="answer" rows="3" required>{{ $faq->answer }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update FAQ</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('admin.layouts.main')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title">Add Review</h1>
                            <form action="{{ route('reviews.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="user_id">User</label>
                                    <select name="user_id" id="user_id" class="form-control">
                                        <option value="" disabled selected>Select User</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->first_name }}
                                                {{ $user->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="activity_id">Activity</label>
                                    <select name="activity_id" id="activity_id" class="form-control">
                                        <option value="" disabled selected>Select Activity</option>
                                        @foreach ($activities as $activity)
                                            <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="comment">Comment</label>
                                    <textarea name="comment" id="comment" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="rating">Rating</label>
                                    <input type="number" name="rating" id="rating" class="form-control" min="1"
                                        max="5">
                                </div>
                                <button type="submit" class="btn btn-primary btn-rounded btn-fw">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

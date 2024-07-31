@extends('admin.layouts.main')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title">Reviews</h1>
                            <a href="{{ route('reviews.create') }}"
                                class="btn mb-2 btn-primary btn-rounded btn-fw float-right">Add
                                Review</a>
                            <div class="table-responsive">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @displayErrors
                                <table id="dataTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Activity</th>
                                            <th>Comment</th>
                                            <th>Rating</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($data as $review)
                                            <tr>
                                                <td>{{ $review->id }}</td>
                                                <td>{{ $review->user->first_name }} {{ $review->user->last_name }}</td>
                                                <td>{{ $review->activity->name }}</td>
                                                <td>{{ $review->comment }}</td>
                                                <td>{{ $review->rating }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="actionDropdown" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="actionDropdown">
                                                            <a class="dropdown-item"
                                                                href="{{ route('reviews.destroy', $review->id) }}"
                                                                onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this review?')) document.getElementById('delete-form-{{ $review->id }}').submit();">Delete</a>

                                                            <form id="delete-form-{{ $review->id }}"
                                                                action="{{ route('reviews.destroy', $review->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6">No reviews found</td>
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

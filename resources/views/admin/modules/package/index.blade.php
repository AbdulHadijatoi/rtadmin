@extends('admin.layouts.main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Activity</h1>
                        <a href="{{route('packages.create')}}"
                            class="btn btn-primary btn-rounded btn-fw float-right">Add New</a>
                        <div class="table-responsive">

                            @displayErrors
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Activity</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Adult Price</th>
                                        <th>Child Price</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($package as $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->activity->name}}</td>
                                        <td>{{$value->title}}</td>
                                        @if($value->category==='private')
                                        <td>{{$value->price}}</td>
                                        @else
                                        <td>Sharing</td>
                                        @endif
                                        @if($value->category==='sharing')
                                        <td>{{$value->adult_price}}</td>
                                        <td>{{$value->child_price}}</td>
                                        @else
                                        <td>Private</td>
                                        <td>Private</td>
                                        @endif
                                        <td>{{$value->highlight}}</td>
                                        <td>
                                            {{$value->category}}
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="actionDropdown" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="actionDropdown">
                                                    <a class="dropdown-item"
                                                        href="{{ route('packages.edit', $value->id) }}">Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('packages.destroy', $value->id) }}"
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this package?')) document.getElementById('delete-form-{{ $value->id }}').submit();">Delete</a>

                                                    <form id="delete-form-{{ $value->id }}"
                                                        action="{{ route('packages.destroy', $value->id) }}"
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
                                        <td colspan="7">No data found</td>
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

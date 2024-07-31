@extends('admin.layouts.main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">All Categories</h1>
                        <a href="{{route('categories.create')}}"
                                class="btn btn-primary btn-rounded btn-fw float-right mb-2">Add New</a>
                        <div class="table-responsive">

                            @displayErrors
                            <table id="dataTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td><img src="{{$category->image}}" style="width: 50px; height: 50px;" alt="null" ></td>
                                        <td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-icon-text">edit</a>
                                            <a href="{{ route('categories.destroy', $category->id) }}" class="btn btn-danger btn-icon-text">delete</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5">No data found</td>
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

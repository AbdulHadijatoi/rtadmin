@extends('admin.layouts.main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">All Sub Categories</h1>
                        <a href="{{route('subcategories.create')}}"
                                class="btn btn-primary btn-rounded btn-fw float-right mb-2">Add New</a>
                        <div class="table-responsive">

                          @displayErrors
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th>SubCategory</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($subcategories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->category->name}}</td>
                                        <td>{{$category->name}}</td>
                                        <td><a href="{{ route('subcategories.edit', $category->id) }}" class="btn btn-primary btn-icon-text">edit</a>
                                            <a href="{{ route('subcategories.destroy', $category->id) }}" class="btn btn-danger btn-icon-text">delete</a>
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

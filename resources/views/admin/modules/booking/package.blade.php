@extends('admin.layouts.main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">All packages</h1>
                        <div class="table-responsive">

                            @displayErrors
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#rf</th>
                                        <th>Adult</th>
                                        <th>Child</th>
                                        <th>Infant</th>
                                        <th>package Title</th>
                                        <th>Total Price</th>
                                        <th>pacakge Category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($data as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->adult}}</td>
                                            <td>{{$item->child}}</td>
                                             <td>{{$item->infant}}</td>
                                            <td>{{$item->package_title}}</td>
                                            <td>{{$item->total_price}}</td>
                                            <td>{{$item->package_category}}</td>
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
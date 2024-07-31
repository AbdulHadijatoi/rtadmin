@extends('admin.layouts.main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">All Coupon</h1>
                        <a href="{{route('admin.couponCreate')}}"
                            class="btn btn-primary btn-rounded btn-fw float-right mb-2">Add New</a>


                        <div class="table-responsive">

                            @displayErrors
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Voucher Code</th>
                                        <th>Amount</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($data as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->code}}</td>
                                            <td>{{$item->discount_price}}</td>
                                            <td><a href="{{ route('admin.coupondelete', $item->id) }}" class="btn btn-danger btn-icon-text">delete</a></td>
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
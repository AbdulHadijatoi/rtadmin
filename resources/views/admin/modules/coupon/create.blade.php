@extends('admin.layouts.main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Coupon</h4>
                        @if(Session::get('error'))
                            <div class="alert alert-danger">
                                {{Session::get('error')}}
                            </div>
                        @endif
                        <form class="forms-sample" action="{{ route('admin.couponStore') }}" method="post">
                            @csrf
                            <!-- <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" placeholder="Email" name="recipient_email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div> -->
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" class="form-control @error('amount') is-invalid @enderror"
                                    id="amount" placeholder="Amount" name="discount_price" step="0.01">
                                @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="amount">Voucher Code</label>
                                <input type="text" class="form-control @error('voucher_code') is-invalid @enderror"
                                    id="voucher_code" placeholder="Voucher code" name="voucher_code" step="0.01">
                                @error('voucher_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!-- <div class="form-group">
                                <label for="description">Message</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                    id="description" placeholder="Write Message" name="description"></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div> -->
                            
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

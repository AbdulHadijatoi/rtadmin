@extends('admin.layouts.main')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title">Find-Us Details</h1>
                            @if ($data->isEmpty())
                                <a href="{{ route('setting.find.create') }}"
                                    class="btn btn-primary btn-rounded btn-fw float-right mb-2">Add New</a>
                            @endif

                            <div class="row justify-content-center">
                                @forelse($data as $item)
                                    <div class="col-md-8 mb-2">
                                        <h4 class="text-center">Header Image</h4>
                                        <img class="card-img-top" src="{{ asset($item->header_image) }}" alt="null"
                                            width="100" height="100">
                                        <hr>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <h4 class="text-center">Find-Us Details</h4>
                                        <div class="card shadow">
                                            <img class="card-img-top" src="{{ asset($item->image) }}" alt="null"
                                                width="100" height="100">
                                            <div class="card-body">
                                                {{--  @if ($item->image)
                                                    <img src="{{ asset($item->image) }}" alt="Image"
                                                        class="img-fluid mb-3" width="100">
                                                @endif  --}}
                                                <p class="card-text"><strong>Phone:</strong> {{ $item->phone }}</p>
                                                <p class="card-text"><strong>Email:</strong> {{ $item->email }}</p>
                                                <p class="card-text"><strong>WhatsApp:</strong> {{ $item->whatsapp }}</p>
                                                <p class="card-text"><strong>Address:</strong> {{ $item->address }}</p>
                                                <p class="card-text"><strong>Time Zone:</strong> {{ $item->time_zone }}</p>
                                                <p class="card-text"><strong>Booking Email:</strong>
                                                    {{ $item->booking_email }}</p>
                                                <p class="card-text"><strong>Business Email:</strong>
                                                    {{ $item->business_email }}</p>
                                                <p class="card-text"><strong>Press Email:</strong> {{ $item->press_email }}
                                                </p>
                                                <p class="card-text"><strong>General Email:</strong>
                                                    {{ $item->general_email }}</p>
                                                <a href="{{ route('setting.find.edit', $item->id) }}"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                                <a href="{{ route('setting.find-destroy', $item->id) }}"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <p class="text-center">No data found</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

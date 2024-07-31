@extends('admin.layouts.main')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title">Contact-Us Details</h1>
                            @if ($data->isEmpty())
                                <a href="{{ route('setting.contact.create') }}"
                                    class="btn btn-primary btn-rounded btn-fw float-right mb-2">Add New</a>
                            @endif

                            <div class="row justify-content-center">
                                @forelse($data as $item)
                                    <div class="col-md-6 mb-4">
                                        <div class="card shadow">
                                            <img class="card-img-top" src="{{ asset($item->image) }}" alt="null"
                                                width="100" height="100">
                                            <div class="card-body">
                                                <p class="card-text"><strong>Phone:</strong> {{ $item->phone }}</p>
                                                <p class="card-text"><strong>Email:</strong> {{ $item->email }}</p>
                                                <p class="card-text"><strong>Address:</strong> {{ $item->address }}</p>
                                                <p class="card-text"><strong>Facebook:</strong> <a
                                                        href="{{ $item->facebook }}"
                                                        target="_blank">{{ $item->facebook }}</a></p>
                                                <p class="card-text"><strong>Instagram:</strong> <a
                                                        href="{{ $item->instagram }}"
                                                        target="_blank">{{ $item->instagram }}</a></p>
                                                <p class="card-text"><strong>Twitter:</strong> <a
                                                        href="{{ $item->twitter }}"
                                                        target="_blank">{{ $item->twitter }}</a>
                                                </p>
                                                <a href="{{ route('setting.contact.edit', $item->id) }}"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                                <a href="{{ route('setting.contact-destroy', $item->id) }}"
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

@extends('admin.layouts.main')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title">Activity</h1>
                            <a href="{{ route('activities.create') }}"
                                class="btn btn-primary btn-rounded btn-fw float-right mb-2">Add New</a>
                            <div class="table-responsive">

                                @displayErrors
                                <table id="dataTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Url</th>
                                            <th>Name</th>
                                            <th>Page Title</th>
                                            <th>Category</th>
                                            <th>Duration</th>
                                            <th>Start Time</th>
                                            <th>Cancellation Duration</th>
                                            <th>Description</th>
                                            <th>Instructions</th>
                                            <th>Packages</th>
                                            <th>Features</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($activity as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->slug }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->page_title }}</td>
                                                <td>{{ $value->category->name }}</td>
                                                <td>{{ $value->duration }}</td>
                                                <td>{{ $value->start_time }}</td>
                                                <td>{{ $value->cancellation_duration }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#descriptionModal"
                                                        data-description="{{ $value->description }}">
                                                        View Description
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#instructionModal"
                                                        data-instruction-base-url="{{ route('instruction-destroy', ['id' => 0]) }}"
                                                        data-instruction="{{ $value->instructions }}">
                                                        view Instructions
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#packageModal"
                                                        data-base-url="{{ route('packages-destroy', ['id' => 0]) }}"
                                                        data-package="{{ $value->packages }}">
                                                        view Packages
                                                    </button>
                                                </td>
                                                <td>
                                                    @if (is_array($value->features))
                                                        <ul>
                                                            @foreach ($value->features as $feature)
                                                                <li>{{ $feature }}</li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        {{ $value->features }}
                                                    @endif
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
                                                                href="{{ route('activities.edit', $value->id) }}">Edit</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('activities.destroy', $value->id) }}"
                                                                onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this activity?')) document.getElementById('delete-form-{{ $value->id }}').submit();">Delete</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.activityimages', $value->id) }}">Images</a>
                                                            <form id="delete-form-{{ $value->id }}"
                                                                action="{{ route('activities.destroy', $value->id) }}"
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

    <!-- Modal -->
    <div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="width:80%; max-width: 80%;
    height: 100%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="descriptionModalLabel">Activity Description</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center lead" id="modalDescriptionContent">
                    <!-- Description will be loaded here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="instructionModal" tabindex="-1" role="dialog" aria-labelledby="instructionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="width:80%; max-width: 80%;
    height: 100%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="instructionModalLabel">Activity Instructions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="dataTable2" class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="modalInstructionContent">
                            <!-- Instructions will be loaded here -->
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="packageModal" tabindex="-1" role="dialog" aria-labelledby="packageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="width:80%; max-width: 80%;
    height: 100%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="packageModalLabel">Activity Packages</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="dataTable3" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Adult Price</th>
                                    <th>Child Price</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="modalPackageContent">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#descriptionModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var description = button.data('description')
                var modal = $(this)
                modal.find('.modal-body').text(description)
            })

            $('#instructionModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var instructions = button.data('instruction');
                var baseUrl = button.data('instruction-base-url');
                var modal = $(this);
                var modalBody = modal.find('.modal-body');

                modalBody.find('#modalInstructionContent').empty();

                $.each(instructions, function(index, instruction) {
                    var deleteUrl = baseUrl.replace('/0', '/' + instruction.id);
                    var row = '<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                        '<td>' + instruction.instruction_title + '</td>' +
                        '<td style="white-space:normal">' + instruction.instruction_description +
                        '</td>' +
                        '<td><a href="' + deleteUrl + '" class="btn btn-danger">Delete</a></td>' +
                        '</tr>';
                    modalBody.find('#modalInstructionContent').append(row);
                });
            });

            $('#packageModal').on('show.bs.modal', function(event) {

                var button = $(event.relatedTarget);
                var packages = button.data('package');
                var baseUrl = button.data('base-url');
                var modal = $(this);
                var modalBody = modal.find('.modal-body');

                modalBody.find('#modalPackageContent').empty();

                $.each(packages, function(index, package) {
                    var deleteUrl = baseUrl.replace('/0', '/' + package.id);
                    var row = '<tr>' +
                        '<td>' + package.id + '</td>' +
                        '<td>' + package.title + '</td>' +
                        (package.category === 'private' ? '<td>' + package.price + '</td>' :
                            '<td>Sharing</td>') +
                        (package.category === 'sharing' ? '<td>' + package.adult_price +
                            '</td><td>' + package.child_price + '</td>' :
                            '<td>Private</td><td>Private</td>') +
                        '<td style="white-space:normal">' + package.highlight + '</td>' +
                        '<td>' + package.category + '</td>' +
                        '<td><a href="' + deleteUrl + '" class="btn btn-danger">Delete</a></td>' +
                        '</tr>';
                    modalBody.find('#modalPackageContent').append(row);
                });
            });
        });
    </script>

    <style>
        /* Custom styles to make the modal body scrollable */
        .modal-body {
            overflow-y: auto;
        }
    </style>
@endsection

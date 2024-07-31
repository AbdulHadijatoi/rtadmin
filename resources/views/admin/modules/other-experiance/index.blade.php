@extends('admin.layouts.main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Activity</h1>
                        <a href="{{route('otherexperiances.create')}}"
                            class="btn btn-primary btn-rounded btn-fw float-right">Add New</a>
                        <div class="table-responsive">

                            @if(Session::get('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                            @endif
                            @if(Session::get('error'))
                            <div class="alert alert-danger">
                                {{Session::get('error')}}
                            </div>
                            @endif
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Duration</th>
                                        <th>Cancellation Duration</th>
                                        <th>Discount Offer</th>
                                        <th>Description</th>
                                        <th>Instructions</th>
                                        <th>Features</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($activity as $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->category->name}}</td>
                                        <td>{{$value->duration}}</td>
                                        <td>{{$value->cancellation_duration}}</td>
                                        <td>{{$value->discount_offer}}</td>
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
                                                data-instruction="{{ $value->instructions }}">
                                                view Instructions
                                            </button>
                                        </td>
                                        <td>
                                            @if(is_array($value->features))
                                                <ul>
                                                    @foreach($value->features as $feature)
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
                                                        href="{{ route('otherexperiances.edit', $value->id) }}">Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('otherexperiances.destroy', $value->id) }}"
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this activity?')) document.getElementById('delete-form-{{ $value->id }}').submit();">Delete</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.activityimages', $value->id) }}">Images</a>
                                                    <form id="delete-form-{{ $value->id }}"
                                                        action="{{ route('otherexperiances.destroy', $value->id) }}"
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="descriptionModalLabel">Activity Description</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalDescriptionContent">
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="instructionModalLabel">Activity Instructions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
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


<script>
document.addEventListener('DOMContentLoaded', function() {
    $('#descriptionModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var description = button.data('description') // Extract info from data-* attributes
        var modal = $(this)
        modal.find('.modal-body').text(description)
    })

    $('#instructionModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var instructions = button.data('instruction');
        var modal = $(this);
        var modalBody = modal.find('.modal-body');

        modalBody.find('#modalInstructionContent').empty();

        $.each(instructions, function(index, instruction) {
            var row = '<tr>' +
                '<td>' + (index + 1) + '</td>' +
                '<td>' + instruction.instruction_title + '</td>' +
                '<td>' + instruction.instruction_description + '</td>' +
                '</tr>';
            modalBody.find('#modalInstructionContent').append(row);
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

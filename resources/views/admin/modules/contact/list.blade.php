@extends('admin.layouts.main')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Contact Us</h1>
                        <div class="table-responsive">

                            @displayErrors
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Company</th>
                                        <th>Topic</th>
                                        <th>Mobile</th>
                                        <th>Status</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($contact as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->first_name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->company_name }}</td>
                                            <td>{{ $value->inquiry_topic }}</td>
                                            <td>{{ $value->mobile }}</td>
                                            <td>{{ $value->status == 0 ? 'Pending' : 'Replied' }}</td>
                                            <td>
                                                <button class="btn btn-info btn-icon-text" data-toggle="modal"
                                                    data-target="#messageModal" data-id="{{ $value->id }}"
                                                    data-message="{{ $value->message }}">
                                                    View Detail
                                                </button>
                                            </td>
                                            <td>
                                            <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="statusDropdown" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    {{ $value->status == 0 ? 'Pending' : 'Replied' }}
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="statusDropdown">
                                                    @if ($value->status == 0)
                                                    <form action="{{ route('contacts.contactEmail', $value->id) }}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        <button type="submit" class="dropdown-item">Reply</button>
                                                    </form>
                                                    @else
                                                    <span class="dropdown-item disabled">Replied</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        </td>

                                            <!-- <td><a href="" class="btn btn-primary btn-icon-text">Edit</a></td> -->
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8">No data found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <!-- Modal -->
                            <div class="modal fade" id="messageModal" tabindex="-1" role="dialog"
                                aria-labelledby="messageModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="messageModalLabel">Message Detail</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p id="messageDetail"></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Modal -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    $('#messageModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var message = button.data('message');
        var modal = $(this);
        modal.find('.modal-body #messageDetail').text(message);
    });
</script>
@endsection
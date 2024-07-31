@extends('admin.layouts.main')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title">All Bookings</h1>

                            <!-- Date Filters -->
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <!-- Filter by booking date -->
                                    <div class="row">
                                        <label for="" class="p-2">Select Booking Date</label>
                                        <div class="col-7">
                                            <input type="date" id="filterDate" name="filterDate" class="form-control"
                                                max="{{ date('Y-m-d') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <!-- Filter by tour date -->
                                    <div class="row">
                                        <label for="" class="p-2">Select Tour Date</label>
                                        <div class="col-7">
                                            <input type="date" id="tourDateInput" name="tourDateInput"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                @displayErrors
                                <table id="dataTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Payment Status</th>
                                            <th>Package</th>
                                            <th>Name</th>
                                            {{-- <th>Email</th> --}}
                                            <th>Booking Date</th>
                                            <th>Tour Date</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($data as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                @if ($item->status === 'success')
                                                    <td class="text-success">{{ $item->status }}</td>
                                                @elseif ($item->status === 'canceled')
                                                    <td class="text-danger">{{ $item->status }}</td>
                                                @elseif ($item->status === 'failed')
                                                    <td class="text-danger">{{ $item->status }}</td>
                                                @endif
                                                <td><a href="{{ route('admin.bookings.package', $item->id) }}"
                                                        class="btn btn-dark">Package</a></td>
                                                <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                                {{-- <td>{{ $item->email }}</td> --}}
                                                <td>{{ $item->created_at?$item->created_at->format('Y-m-d'):'' }}</td>
                                                <td>{{ $item->date }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal"
                                                        data-target="#bookingModal" data-id="{{ $item->id }}"
                                                        data-first_name="{{ $item->first_name }}"
                                                        data-last_name="{{ $item->last_name }}"
                                                        data-email="{{ $item->email }}"
                                                        data-activity_name="{{ $item->activity_name }}"
                                                        data-title="{{ $item->title }}"
                                                        data-nationality="{{ $item->nationality }}"
                                                        data-phone="{{ $item->phone }}" data-date="{{ $item->date }}"
                                                        data-total_amount="{{ $item->total_amount }}"
                                                        data-pickup_location="{{ $item->pickup_location }}"
                                                        data-package_url="{{ route('admin.bookings.package', $item->id) }}"
                                                        data-note="{{ $item->note }}">View</button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="16">No data found</td>
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
    <div id="bookingModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Booking Details</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>First Name:</strong> <span id="modalFirstName"></span></li>
                        <li class="list-group-item"><strong>Last Name:</strong> <span id="modalLastName"></span></li>
                        <li class="list-group-item"><strong>Email:</strong> <span id="modalEmail"></span></li>
                        <li class="list-group-item"><strong>Activity Name:</strong> <span id="modalActivityName"></span>
                        </li>
                        <li class="list-group-item"><strong>Title:</strong> <span id="modalTitle"></span></li>
                        <li class="list-group-item"><strong>Nationality:</strong> <span id="modalNationality"></span></li>
                        <li class="list-group-item"><strong>Phone:</strong> <span id="modalPhone"></span></li>
                        <li class="list-group-item"><strong>Date:</strong> <span id="modalDate"></span></li>
                        <li class="list-group-item"><strong>Total Amount:</strong> <span id="modalTotalAmount"></span></li>
                        <li class="list-group-item"><strong>Pickup Location:</strong> <span id="modalPickupLocation"></span>
                        </li>
                        <li class="list-group-item"><strong>Note:</strong> <span id="modalNote"></span></li>
                        <li class="list-group-item">
                            <a href="" id="modalPackageButton" class="btn btn-dark">Packages</a>
                        </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <!-- Include jQuery and DataTables scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#dataTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
            });

            // Filter by booking date
            $('#filterDate').change(function() {
                table.draw();
            });

            // Filter by tour date
            $('#tourDateInput').change(function() {
                table.draw();
            });

            // Custom filter function
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var bookingDate = $('#filterDate').val();
                    var tourDate = $('#tourDateInput').val();
                    var bookingDateFilter = data[4].trim(); // Use the index of the date column
                    var TourDateFilter = data[5].trim(); // Use the index of the date column

                    if (bookingDate && tourDate) {
                        return bookingDateFilter == bookingDate || TourDateFilter == tourDate;
                    } else if (bookingDate) {
                        return bookingDateFilter == bookingDate;
                    } else if (tourDate) {
                        return TourDateFilter == tourDate;
                    }
                    return true;
                }
            );

            $('#bookingModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var modal = $(this);

                // Set modal content
                modal.find('#modalFirstName').text(button.data('first_name'));
                modal.find('#modalLastName').text(button.data('last_name'));
                modal.find('#modalEmail').text(button.data('email'));
                modal.find('#modalActivityName').text(button.data('activity_name'));
                modal.find('#modalTitle').text(button.data('title'));
                modal.find('#modalNationality').text(button.data('nationality'));
                modal.find('#modalPhone').text(button.data('phone'));
                modal.find('#modalDate').text(button.data('date'));
                modal.find('#modalTotalAmount').text(button.data('total_amount'));
                modal.find('#modalPickupLocation').text(button.data('pickup_location'));
                modal.find('#modalNote').text(button.data('note'));
                modal.find('#modalPackageButton').attr('href', button.data('package_url'));
            });
        });
    </script>
@endsection

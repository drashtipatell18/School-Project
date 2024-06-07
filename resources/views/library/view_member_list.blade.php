@extends('admin.main')
@section('content')
    <style>
        .button-container {
            display: flex;
            justify-content: flex-end;
        }

        .box {
            position: relative;
            border-radius: 3px;
            background: #ffffff;
            margin-bottom: 10px;
            width: 100%;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        }

        div.box {
            height: fit-content;
            padding: 10px;
            overflow: auto;
            border: 1px solid #8080FF;
            background-color: #E5E5FF;
        }

        .box-body {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
            padding: 10px;
        }

        .sfborder .img-circle,
        .box-profile .img-circle,
        .table td .img-circle {
            height: 100px;
            flex-shrink: 0;
            min-width: 100px;
            min-height: 100px;
            border-radius: 6px;
        }

        .qty_error {
            display: none;
        }

        .box-body .box-profile {
            text-align: center !important;
        }

        .list-group-unbordered {
            text-align: left;
        }
    </style>
    <div class="right_col" role="main">
        <div class="row" style="display: block;">
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <input type="hidden" id="userIdInput" value="{{ $members->userid }}">
                        <input type="hidden" id="memberid" value="{{ $members->id }}">
                        <div class="text-center">
                            <img class="profile-user-img img-responsive img-circle" id="profilePicture" src=""
                                alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">{{ $members->name }}</h3>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Member ID</b> <a class="pull-right text-aqua">{{ $members->userid }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Library Card No.</b> <a class="pull-right text-aqua">{{ $members->id }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Admission No</b> <a class="pull-right text-aqua">{{ $members->addmissionno }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Member Type</b> <a class="pull-right text-aqua">{{ $members->role }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Mobile Number</b> <a class="pull-right text-aqua">{{ $members->phone }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @if (auth()->check())
                @php
                    $userRole = strtolower(auth()->user()->role);
                @endphp
            @endif
            <div class="col-md-9">
                @if ($userRole != 'student' && $userRole != 'parents')
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Issue Book</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST"
                            action="{{ '/admin/bookissue/insert' }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $members->id }}">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Books <small class="req"> *</small></label>
                                    <select class="form-control @error('book') is-invalid @enderror" name="book"
                                        id="book">
                                        <option value="">Select a book</option>
                                        @foreach ($books as $book)
                                            <option value="{{ $book }}">
                                                {{ $book }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('book')
                                        <span class="invalid-feedback" style="color: red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input type="hidden" id="availableQuantity" name="availableQuantity" value="">
                                    <span class="text text-danger qty_error"><b>Available Quantity</b>: <span
                                            class="ava_quantity">0</span></span>
                                </div>
                                <div class="form-group">
                                    <label>Due Return Date <small class="req"> *</small></label>
                                    <input type="date" class="form-control @error('duereturndate') is-invalid @enderror"
                                        name="duereturndate" value="">
                                    @error('duereturndate')
                                        <span style="color: red"
                                            class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror <span class="text-danger"></span>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right">Save</button>
                            </div>
                        </form>
                    </div>
                @endif

                <div class="box box-primary">
                    <div class="box-header ptbnull">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>Book Issued</h3>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-striped jambo_table bulk_action" id="table">
                                <thead>
                                    <tr class="">
                                        <th class="">No</th>
                                        <th class="">Book Title</th>
                                        <th class="">Issue Date</th>
                                        <th class="">Due Return Date</th>
                                        <th class="">Return Date</th>
                                        <th class=""><span class="nobr">Action</span></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($bookissues as $index => $bookissue)
                                        <tr class="">
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $bookissue->book }}</td>
                                            <td class="date-placeholder">{{ $bookissue->created_at }}</td>
                                            <td class="">{{ $bookissue->duereturndate }}</td>
                                            <td class="returndate">{{ $bookissue->returndate }}</td>
                                            <td>
                                                @if ($bookissue->returndate == '')
                                                    <a href="#" class="btn btn-info btn-sm return-date-btn"
                                                        data-id="{{ isset($bookissue) ? $bookissue->id : '' }}">
                                                        <i class="fa fa-mail-reply"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirm Return</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <label>Return Date <small class="req"> *</small></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="hidden" name="bookissueid"
                                            value="{{ isset($bookissue) ? $bookissue->id : '' }}">
                                        <input type="date" class="form-control" id="returndate" name="returndate"
                                            placeholder="Date">
                                    </div>
                                    @error('duereturndate')
                                        <span style="color: red"
                                            class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary save-date-btn">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();

            // var today = new Date();
            // var formattedMonth = (today.getMonth() + 1 < 10) ? '0' + (today.getMonth() + 1) : today.getMonth() + 1;
            // var formattedDate = (today.getDate() < 10) ? '0' + today.getDate() : today.getDate();
            // var formattedDate = today.getFullYear() + '-' + formattedMonth + '-' + formattedDate;
            // // Update the text content of the td element
            // $('.date-placeholder').text(formattedDate);

            $.each($('.date-placeholder'), function(){
                let today = new Date($(this).text())
                var formattedMonth = (today.getMonth() + 1 < 10) ? '0' + (today.getMonth() + 1) : today.getMonth() + 1;
                var formattedDate = (today.getDate() < 10) ? '0' + today.getDate() : today.getDate();
                var formattedDate = today.getFullYear() + '-' + formattedMonth + '-' + formattedDate;
                $(this).text(formattedDate)
            })
            $('.return-date-btn').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                $('#myModal').find('input[name="id"]').val(id);
                $('#myModal').modal('show');
            });


            $('.save-date-btn').click(function(event) {
                event.preventDefault(); // Prevent the default form submission behavior

                console.log('Save button clicked');

                var selectedDate = $('#returndate').val();
                var bookissueid = $('input[name="bookissueid"]').val();
                var token = $('meta[name="csrf-token"]').attr('content');
                var memberid = $('#memberid').val();
                if (selectedDate == '') {
                    console.log('Please select a date');
                    $('#date-error').text('Please select a date');
                    return;
                }

                console.log('Date selected:', selectedDate);
                console.log('Book ID:', bookissueid);
                console.log('CSRF token:', token);
                console.log('userId:', memberid);

                $.ajax({
                    url: '/save-date',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    data: {
                        bookissueid: bookissueid,
                        returndate: selectedDate,
                        memberid: memberid
                    },
                    success: function(response) {
                        window.location.reload();
                        console.log('Date saved successfully');
                        $('.returndate').text(selectedDate);
                        $('#myModal').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saving date:', error);
                    }
                });
            });


            $('#book').change(function() {
                var selectedBook = $(this).val();
                if (selectedBook) {
                    $.ajax({
                        type: 'GET',
                        url: '/get-qty', // Replace with your actual route URL
                        data: {
                            book: selectedBook
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.qty) {
                                // Update the available quantity display
                                $('.qty_error').css('display', 'block');
                                $('.ava_quantity').text(response.qty);
                                // Update the hidden input field with the available quantity
                                $('#ava_quantity').val(response.qty);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                        }
                    });
                } else {
                    // If no book is selected, hide the quantity display
                    $('.qty_error').css('display', 'none');
                }
            });
            $('#demo-form2').submit(function(event) {
                event.preventDefault(); // Prevent form submission

                // Get the selected book and its available quantity
                var selectedBook = $('#book').val();
                var availableQuantity = $('.ava_quantity').val();

                // Decrease available quantity by 1
                var newAvailableQuantity = parseInt(availableQuantity) - 1;

                // Update the hidden input field with the new available quantity
                $('.ava_quantity').val(newAvailableQuantity);

                // Submit the form
                this.submit();
            });

            function updateProfilePicture(userId) {
                $.ajax({
                    type: 'GET',
                    url: '/get-imagebyid',
                    data: {
                        id: userId
                    },
                    success: function(response) {
                        console.log(response.image);
                        if (response.image) {
                            $('#profilePicture').attr('src', '/images/' + response.image);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }

            $(document).ready(function() {
                var defaultUserId = $('#userIdInput').val();
                updateProfilePicture(defaultUserId);
                $('#userIdInput').on('change', function() {
                    var userId = $(this).val();
                    updateProfilePicture(userId);
                });
            });


        });
    </script>
@endpush

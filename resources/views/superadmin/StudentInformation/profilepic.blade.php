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
                            <input type="hidden" id="studentid" value="{{ $student->id }}">
                        <img class="profile-user-img img-responsive img-circle" id="profilePicture" src=""
                            alt="User profile picture">

                        <h3 class="profile-username text-center">{{ $student->first_name . $student->last_name }}</h3>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Member ID</b> <a class="pull-right text-aqua">{{ $student->userid }}</a>
                            </li>
                            <li class="list-group-item">
                                {{-- <b>Library Card No.</b> <a class="pull-right text-aqua">{{ $students->id }}</a> --}}
                            </li>
                            <li class="list-group-item">
                                {{-- <b>Admission No</b> <a class="pull-right text-aqua">{{ $students->addmissionno }}</a> --}}
                            </li>
                            <li class="list-group-item">
                                {{-- <b>Member Type</b> <a class="pull-right text-aqua">{{ $students->role }}</a> --}}
                            </li>
                            <li class="list-group-item">
                                {{-- <b>Mobile Number</b> <a class="pull-right text-aqua">{{ $students->phone }}</a> --}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Issue Book</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST"
                        action="{{ '/admin/bookissue/insert' }}">
                        @csrf
                        {{-- <input type="hidden" name="id" value="{{ $members->id }}"> --}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Books <small class="req"> *</small></label>
                                <select class="form-control @error('book') is-invalid @enderror" name="book"
                                    id="book">
                                    <option value="">Select a book</option>
                                    {{-- @foreach ($books as $book)
                                        <option value="{{ $book }}">
                                            {{ $book }}
                                        </option>
                                    @endforeach --}}
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

              
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
    
            function updateProfilePicture(studid) {
                $.ajax({
                    type: 'GET',
                    url: '/get-imagebyidstud',
                    data: {
                        id: studid
                    },
                    success: function(response) {
                        console.log(response.image);
                        if (response.image) {
                            $('#profilePicture').attr('src', '/student_photos/' + response.image);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }




        });
    </script>
@endpush

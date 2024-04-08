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
                        @if ($student)
                            <input type="hidden" id="studentid" value="{{ $student->id }}">
                            <img class="profile-user-img img-responsive img-circle" id="profilePicture"
                                src="/student_photos/{{ $student->student_photo }}" alt="User profile picture">

                            <h3 class="profile-username text-center">{{ $student->father_name }}</h3>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Member ID</b> <a class="pull-right text-aqua">{{ $student->userid }}</a>
                                </li>
                                <!-- Add more details here as needed -->
                            </ul>
                        @else
                            <p>No student found.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Issue Book</h3>
                    </div>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST"
                        action="{{ '/admin/bookissue/insert' }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <!-- Your form fields here -->
                            </div>
                        </div>
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
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();

            // Function to update profile picture
            function updateProfilePicture(studid) {
                $.ajax({
                    type: 'GET',
                    url: '/get-imagebyidstud',
                    data: {
                        id: studid
                    },
                    success: function(response) {
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

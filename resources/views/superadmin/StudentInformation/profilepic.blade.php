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

        .tab-content {
            background: #fff;
            padding: 10px;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
        }

        .tshadow {
            border: 1px solid #e7ebf0;
        }

        .mb25 {
            margin-bottom: 25px;
        }

        .bozero {
            border-top: 0 !important;
        }

        .around10 {
            padding: 10px;
        }

        .pt0 {
            padding-top: 0 !important;
        }

        .table3 {
            border: 0;
            width: 100%;
        }

        table {
            empty-cells: hide;
            color: #444;
        }

        .bordertop {
            border-top: 1px solid #f4f4f4 !important;
        }

        .table3 tr td {
            border: 0;
            padding: 5px;
        }
    </style>
    <div class="right_col" role="main">
        <div class="row" style="display: block;">
            <div class="col-md-3">
                <div class="box box-primary">
                    <div claclassss="box-body box-profile">
                        <input type="hidden" id="studentid" value="{{ $student->id }}">
                        <img class="profile-user-img img-responsive img-circle" id="profilePicture" src=""
                            alt="User profile picture" style="height:100px">

                        <h3 class="profile-username text-center">{{ $student->first_name . ' ' . $student->last_name }}</h3>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Addmission No</b> <a class="pull-right text-aqua">{{ $student->admissionno }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Roll No</b> <a class="pull-right text-aqua">{{ $student->rollnumber }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Class</b> <a class="pull-right text-aqua">{{ $student->class }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Section</b> <a class="pull-right text-aqua">{{ $student->section }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Gender</b> <a class="pull-right text-aqua">{{ $student->gender }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Profile</h3>
                    </div>
                    <div class="box-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="activity">
                                <div class="tshadow mb25 bozero">
                                    <div class="table-responsive around10 pt0">
                                        <table class="table3 table-striped table-hover">
                                            <tbody>
                                                <tr class="bordertop">
                                                    <td width="35%">Admission Date</td>
                                                    <td class="col-md-5">
                                                        {{ $student->admission_date }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Date of Birth</td>
                                                    <td>{{ $student->date_of_birth }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Category</td>
                                                    <td>{{ $student->category }} </td>
                                                </tr>
                                                <tr>
                                                    <td>Mobile Number</td>
                                                    <td>{{ $student->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Caste</td>
                                                    <td>{{ $student->caste }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Religion</td>
                                                    <td>{{ $student->religion }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>{{ $student->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Medical History</td>
                                                    <td>{{ $student->medical_history }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tshadow mb25 bozero">
                                    <h3 class="pagetitleh2">Address Details</h3>
                                    <div class="table-responsive around10 pt0">
                                        <table class="table3 table-striped table-hover">
                                            <tbody>
                                                <tr>
                                                    <td width="35%">Current Address</td>
                                                    <td class="col-md-5">{{ $student->address }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Permanent Address</td>
                                                    <td>{{ $student->address }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tshadow mb25 bozero">
                                    <h3 class="pagetitleh2">Parent Guardian Detail </h3>
                                    <div class="table-responsive around10 pt0">
                                        <table class="table3 table-striped table-hover">
                                            <tbody>
                                                <tr>
                                                    <td width="35%">Father Name</td>
                                                    <td>{{ $student->father_name	 }}</td>
                                                    <td rowspan="3" width="100"><img
                                                            class="profile-user-img img-responsive img-rounded border0"
                                                            src="             
                https://demo.smart-school.in/uploads/student_images/1676095456-61039820963e72fe03a814!4H8g7_587.jpg?1712565913        ">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Father Phone</td>
                                                    <td>{{ $student->father_phone }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Father Occupation</td>
                                                    <td>{{ $student->father_occupation }}</td>
                                                </tr>
                                                <tr class="bordertop">
                                                    <td>Mother Name</td>
                                                    <td>{{ $student->mother_name }}</td>

                                                    <td rowspan="3" width="100"> <img
                                                            class="profile-user-img img-responsive img-rounded border0"
                                                            src="
            https://demo.smart-school.in/uploads/student_images/1mother.jpg?1712565913        
            ">
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Mother Phone</td>
                                                    <td>{{ $student->mother_phone }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Mother Occupation</td>
                                                    <td>{{ $student->mother_occupation }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tshadow mb25  bozero">
                                    <h3 class="pagetitleh2">Miscellaneous Details</h3>
                                    <div class="table-responsive around10 pt0">
                                        <table class="table3 table-striped table-hover">
                                            <tbody>
                                                <tr>
                                                    <td width="35%">Blood Group</td>
                                                    <td class="col-md-5">{{ $student->blood_group }}</td>
                                                </tr>
                                                <tr>
                                                    <td width="35%">Height</td>
                                                    <td class="col-md-5">{{ $student->height }}</td>
                                                </tr>
                                                <tr>
                                                    <td width="35%">Weight</td>
                                                    <td class="col-md-5">{{ $student->weight }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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

@extends('admin.main')
@section('content')
    <style>
        @media (max-width: 576px) {
            .page-title h3 {
                text-align: center;
                font-size: 1.5rem;
            }

            .custom-column {
                padding: 1rem;
                margin-bottom: 1rem;
            }

            .custom-column h4 {
                font-size: 1rem;
            }

            .custom-column i {
                font-size: 1.5rem;
                margin-bottom: 0.5rem;
            }
        }

        .custom-column {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 70px;
            color: black;
            background-color: rgb(218, 216, 216);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .custom-column:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .custom-column h4 {
            margin-bottom: 1rem;
        }

        .custom-column i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .bg-students {
            background-color: #253e57;
            / Updated color /
            color: #fff;
        }

        .bg-teachers {
            background-color: #253e57;
            / Updated color /
            color: #fff;
        }

        .bg-classes {
            background-color: #253e57;
            / Updated color /
            color: #fff;
        }

        .bg-events {
            background-color: #253e57;
            / Updated color /
            color: #fff;
        }
    </style>

    <div class="right_col" role="main">
        <div class="page-title mb-5">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="ml-4 mt-4">Dashboard</h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="custom-column bg-students mt-5">
                                        <i class="fas fa-user-graduate"></i>
                                        <h4>Total Students</h4>
                                        <h4>{{ $students }}</h4>
                                    </div>
                                    <div class="custom-column bg-teachers mt-3">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                        <h4>Total Teachers</h4>
                                        <h4>{{ $teachers }}</h4>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="custom-column bg-classes mt-5">
                                        <i class="fas fa-school"></i>
                                        <h4>Total Classes</h4>
                                        <h4>{{ $classs }}</h4>
                                    </div>
                                    <div class="custom-column bg-events mt-3 mb-5">
                                        <i class="fas fa-calendar-alt"></i>
                                        <h4>Total Events</h4>
                                        <h4>{{ $events }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
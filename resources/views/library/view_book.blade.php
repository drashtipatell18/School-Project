@extends('admin.main')
@section('content')
    <style>
        .button-container {
            display: flex;
            justify-content: flex-end;
        }
    </style>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Book List</h3>
                </div>
                @if (auth()->check())
                    @php
                        $userRole = strtolower(auth()->user()->role);
                    @endphp
                @endif
                @if ($userRole != 'student' && $userRole != 'parents')
                    <div class="button-container">
                        <a href="{{ route('create.book') }}"><button type="button" class="btn btn-primary btn-sm mt-1">Add
                                Book</button></a>
                    </div>
                @endif
            </div>
            <div class="clearfix"></div>
            <div class="row" style="display: block;">
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Table</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action" id="table">
                                    <thead>
                                        <tr class="">
                                            <th>No</th>
                                            <th class="">Title </th>
                                            <th class="">Description </th>
                                            <th class="">Book No</th>
                                            <th class="">ISBN No</th>
                                            <th class="">Publisher</th>
                                            <th class="">Author</th>
                                            <th class="">Subject</th>
                                            <th class="">Rack No</th>
                                            <th class="">Qty</th>
                                            <th class="">Available</th>
                                            <th class="">Price</th>
                                            <th class="">Post Date </th>
                                            @if ($userRole != 'student' && $userRole != 'parents')
                                                <th class=" no-link last"><span class="nobr">Action</span></th>
                                            @endif
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($books as $index => $book)
                                            <tr class="">
                                                <td>{{ $index + 1 }}</td>
                                                <td class="">{{ $book->title }}</td>
                                                <td class="">
                                                    {{ implode(' ', array_slice(str_word_count($book->description, 1), 0, 15)) }}
                                                </td>
                                                <td class="">{{ $book->bookno }}</td>
                                                <td class="">{{ $book->isbnno }}</td>
                                                <td class="">{{ $book->publisher }}</td>
                                                <td class="">{{ $book->author }}</td>
                                                <td class="">{{ $book->subject }}</td>
                                                <td class="">{{ $book->rackno }}</td>
                                                <td class="">{{ $book->qty }}</td>
                                                <td class="">{{ $book->available }}</td>
                                                <td class="">{{ $book->price }}</td>
                                                <td class="">{{ $book->postdate }}</td>
                                                @if ($userRole != 'student' && $userRole != 'parents')
                                                    <td>
                                                        <a href="{{ route('edit.book', $book->id) }}"
                                                            class="btn btn-info btn-sm">Edit</a>
                                                        <a href="{{ route('destroy.book', $book->id) }}"
                                                            class="btn btn-danger btn-sm"onclick="return confirm('Are you sure you want to delete this ?');">Delete</a>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
        });
    </script>
@endpush

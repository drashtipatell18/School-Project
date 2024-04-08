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
                    <h3>{{ isset($section) ? 'Edit Section Group' : 'Add Section Group'}}</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('section') }}"><button type="button" class="btn btn-primary btn-sm mt-1">View
                            Section</button></a>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Form</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <h2>{{ isset($section) ? 'Edit a Record' : 'Create a new Record' }}</h2>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST"
                                action="{{ isset($section) ? '/admin/section/update/' . $section->id : '/admin/section/insert' }}">
                                @csrf
                                {{-- <div class="item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3 label-align">Section *</label>
                                  <div class="col-md-6 col-sm-6">
                                      <select name="section" class="form-control @error('section') is-invalid @enderror">
                                          <option value="">Select Section</option>
                                          
                                          @php
                                              $sections = range('A', 'Z');
                                          @endphp
                              
                                          @foreach ($sections as $sectionOption)
                                              <option value="{{ $sectionOption }}" {{ old('section', isset($section) ? $section->section : '') == $sectionOption ? 'selected' : '' }}>
                                                  {{ $sectionOption }}
                                              </option>
                                          @endforeach
                                      </select>
                              
                                      @error('section')
                                          <span class="invalid-feedback" style="color: red">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
                               --}}
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Section *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="section" class="form-control @error('section') is-invalid @enderror">
                                            <option value="">Select Section</option>

                                            @php
                                                // $sections = range('A', 'Z');
                                                $sections = array_map('chr', range(ord('A'), ord('Z')));
                                                $selectedValue = old(
                                                    'section',
                                                    isset($section) ? $section->section : '',
                                                );
                                            @endphp

                                            @foreach ($sections as $sectionOption)
                                                <option value="{{ $sectionOption }}"
                                                    {{ $selectedValue == $sectionOption ? 'selected' : '' }}>
                                                    {{ $sectionOption }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('section')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                                        <button type="submit" class="btn btn-primary">
                                            @if (isset($section))
                                                Update
                                            @else
                                                Submit
                                            @endif
                                        </button>
                                        {{-- <button class="btn btn-info" type="reset">Reset</button> --}}
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

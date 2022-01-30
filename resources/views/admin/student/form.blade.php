@extends('admin.index')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">{{$title}}</h3>
                    <div class="row breadcrumbs-top">

                    </div>
                </div>

                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <button form="color" class="btn btn-info bg-gradient-x-info round box-shadow-4 px-2"
                                type="submit">
                            <i class="ft-plus icon-left"></i>
                            {{trans('lang.save')}}
                        </button>
                    </div>
                </div>


            </div>

            <div class="content-body">
                <section id="html5">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-content collapse show">

                                    <div class="card-body card-dashboard">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <form class="form form-horizontal row-separator" name="color"
                                                      method="post" id="color"
                                                      action="{{url('admin/student/save')}}">
                                                    @csrf
                                                    <input type="hidden" name="id" id="id"
                                                           value="{{isset($student) ? $student->id : 0}}">

                                                    <div class="form-body">
                                                        <h4 class="form-section">
                                                            <i class="la la-info"></i>
                                                            {{$title}}
                                                        </h4>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="finish_time">{{trans('lang.finish_time')}}</label>
                                                                    <div class="col-md-9">
                                                                        <div class="position-relative has-icon-left">
                                                                            <input type="time" id="finish_time"
                                                                                   autocomplete="off"
                                                                                   value="{{old('finish_time',!empty($student->finish_time) ? $student->finish_time : '' )}}"
                                                                                   class="form-control border-info "
                                                                                   placeholder="{{trans('lang.finish_time')}}"
                                                                                   name="finish_time">
                                                                            @if ($errors->has('finish_time'))
                                                                                <span class="text-danger">{{$errors->first('finish_time')}}</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control"
                                                                           for="student_count">{{trans('lang.student_count')}}</label>
                                                                    <div class="col-md-9">
                                                                        <div class="position-relative has-icon-left">
                                                                            <input type="number" id="student_count"
                                                                                   autocomplete="off"
                                                                                   value="{{old('student_count',!empty($student->student_count) ? $student->student_count : '' )}}"
                                                                                   class="form-control border-info "
                                                                                   placeholder="{{trans('lang.student_count')}}"
                                                                                   name="student_count">
                                                                            @if ($errors->has('student_count'))
                                                                                <span class="text-danger">{{$errors->first('student_count')}}</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>




                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection

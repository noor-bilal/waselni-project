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
                                                      action="{{url('admin/employee/save')}}">
                                                    @csrf
                                                    <input type="hidden" name="id" id="id"
                                                           value="{{isset($employee) ? $employee->id : 0}}">

                                                    <div class="form-body">
                                                        <h4 class="form-section">
                                                            <i class="la la-info"></i>
                                                            {{$title}}
                                                        </h4>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="name">{{trans('lang.name')}}</label>
                                                                    <div class="col-md-9">
                                                                        <div class="position-relative has-icon-left">
                                                                            <input type="text" id="name"
                                                                                   autocomplete="off"
                                                                                   value="{{old('name',!empty($employee->name) ? $employee->name : '' )}}"
                                                                                   class="form-control border-info "
                                                                                   placeholder="{{trans('lang.name')}}"
                                                                                   name="name">
                                                                            @if ($errors->has('name'))
                                                                                <span class="text-danger">{{$errors->first('name')}}</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control"
                                                                           for="mobile">{{trans('lang.mobile')}}</label>
                                                                    <div class="col-md-9">
                                                                        <div class="position-relative has-icon-left">
                                                                            <input type="text" id="mobile"
                                                                                   autocomplete="off"
                                                                                   value="{{old('mobile',!empty($employee->mobile) ? $employee->mobile : '' )}}"
                                                                                   class="form-control border-info req"
                                                                                   placeholder="{{trans('lang.mobile')}}"
                                                                                   name="mobile">
                                                                            @if ($errors->has('mobile'))
                                                                                <span class="text-danger">{{$errors->first('mobile')}}</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control"
                                                                           for="email">{{trans('lang.email')}}</label>
                                                                    <div class="col-md-9">
                                                                        <div class="position-relative has-icon-left">
                                                                            <input type="text" id="email"
                                                                                   autocomplete="off"
                                                                                   {{isset($employee) ?'readonly' :''}}
                                                                                   value="{{old('email',!empty($employee->email) ? $employee->email : '' )}}"
                                                                                   class="form-control border-info req"
                                                                                   placeholder="{{trans('lang.email')}}"
                                                                                   name="email">
                                                                            @if ($errors->has('email'))
                                                                                <span class="text-danger">{{$errors->first('email')}}</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>






                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control"
                                                                           for="password">{{trans('lang.password')}}</label>
                                                                    <div class="col-md-9">
                                                                        <div class="position-relative has-icon-left">
                                                                            <input type="password" id="password"
                                                                                   autocomplete="off"
                                                                                   value=""
                                                                                   class="form-control border-info req"
                                                                                   placeholder="{{trans('lang.password')}}"
                                                                                   name="password">
                                                                            @if ($errors->has('password'))
                                                                                <span class="text-danger">{{$errors->first('password')}}</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="bus_id">{{trans('lang.select_bus')}}</label>
                                                                    <div class="col-md-9">
                                                                        <div class="position-relative has-icon-left">
                                                                            <select name="bus_id" class="form-control">
                                                                                @if(count($buses) > 0)
                                                                                    @foreach($buses as $bus)
                                                                                        <option value="{{$bus->id}}" {{isset($employee) && $employee->bus->id == $bus->id ? 'selected' : ''}}>{{direction() == 'ar' ? $bus->name_ar : $bus->name_en}}</option>
                                                                                    @endforeach
                                                                                @endif
                                                                            </select>
                                                                            @if ($errors->has('bus_id'))
                                                                                <span class="text-danger">{{$errors->first('bus_id')}}</span>
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

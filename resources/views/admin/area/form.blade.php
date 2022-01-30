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
                                                      action="{{url('admin/area/save')}}">
                                                    @csrf
                                                    <input type="hidden" name="id" id="id"
                                                           value="{{isset($area) ? $area->id : 0}}">

                                                    <div class="form-body">
                                                        <h4 class="form-section">
                                                            <i class="la la-info"></i>
                                                            {{$title}}
                                                        </h4>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control"
                                                                           for="name_ar">{{trans('lang.name_ar')}}</label>
                                                                    <div class="col-md-9">
                                                                        <div class="position-relative has-icon-left">
                                                                            <input type="text" id="name_ar"
                                                                                   autocomplete="off"
                                                                                   value="{{old('name_ar',!empty($area->name_ar) ? $area->name_ar : '' )}}"
                                                                                   class="form-control border-info req"
                                                                                   placeholder="{{trans('lang.name_ar')}}"
                                                                                   name="name_ar">
                                                                            @if ($errors->has('name_ar'))
                                                                                <span class="text-danger">{{$errors->first('name_ar')}}</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control"
                                                                           for="name_en">{{trans('lang.name_en')}}</label>
                                                                    <div class="col-md-9">
                                                                        <div class="position-relative has-icon-left">
                                                                            <input type="text" id="name_en"
                                                                                   autocomplete="off"
                                                                                   value="{{old('name_en',!empty($area->name_en) ? $area->name_en : '' )}}"
                                                                                   class="form-control border-info req"
                                                                                   placeholder="{{trans('lang.name_en')}}"
                                                                                   name="name_en">
                                                                            @if ($errors->has('name_en'))
                                                                                <span class="text-danger">{{$errors->first('name_en')}}</span>
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

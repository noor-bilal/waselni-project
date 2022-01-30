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
                        <button form="trip_form" class="btn btn-info bg-gradient-x-info round box-shadow-4 px-2" type="submit">
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
                                                <form class="form form-horizontal row-separator" id="trip_form" name="trip_form" method="post" action="{{url('admin/trip/save')}}">
                                                    @csrf
                                                    <input type="hidden" name="id" id="id" value="{{isset($trip) ? $trip->id : 0}}">

                                                    <div class="form-body">
                                                        <h4 class="form-section">
                                                            <i class="la la-info"></i>
                                                            {{$title}}
                                                        </h4>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="bus_id">{{trans('lang.bus')}}</label>
                                                                    <div class="col-md-9">
                                                                        <div class="position-relative has-icon-left">
                                                                            <select class="form-control" name="bus_id">
                                                                                @if(count($buses) > 0)
                                                                                    @foreach($buses as $bus)
                                                                                        <option value="{{$bus->id}}" {{isset($trip) && $trip->bus_id == $bus->id ? 'selected' : ''}} >{{direction() == 'ar' ? $bus->name_ar : $bus->name_en}}</option>
                                                                                    @endforeach
                                                                                @endif
                                                                            </select>
                                                                            @if ($errors->has('status'))
                                                                                <span class="text-danger">{{$errors->first('status')}}</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control"
                                                                           for="trip_date">{{trans('lang.trip_date')}}</label>
                                                                    <div class="col-md-9">
                                                                        <div class="position-relative has-icon-left">
                                                                            <input type="date" id="trip_date"
                                                                                   autocomplete="off"
                                                                                   value="{{old('trip_date',!empty($trip->trip_date) ? $trip->trip_date : '' )}}"
                                                                                   class="form-control border-info req"
                                                                                   placeholder="{{trans('lang.trip_date')}}"
                                                                                   name="trip_date">
                                                                            @if ($errors->has('trip_date'))
                                                                                <span class="text-danger">{{$errors->first('trip_date')}}</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">{{trans('lang.status')}}</label>
                                                                    <div class="col-md-9">
                                                                        <div class="position-relative has-icon-left">
                                                                            <select class="form-control" name="status">
                                                                                <option value="1" {{isset($trip->status) && $trip->status == 1  ?'selected' : ''}}>{{__('lang.active')}}</option>
                                                                                <option value="0"  {{isset($trip->status) && $trip->status == 0  ?'selected' : ''}}>{{__('lang.inactive')}}</option>

                                                                            </select>
                                                                            @if ($errors->has('status'))
                                                                                <span class="text-danger">{{$errors->first('status')}}</span>
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

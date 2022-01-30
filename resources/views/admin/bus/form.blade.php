@extends('admin.index')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{theme('app-assets/vendors/css/forms/selects/select2.min.css')}}">
@endpush

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
                                                      action="{{url('admin/bus/save')}}">
                                                    @csrf
                                                    <input type="hidden" name="id" id="id"
                                                           value="{{isset($bus) ? $bus->id : 0}}">

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
                                                                                   value="{{old('name_ar',!empty($bus->name_ar) ? $bus->name_ar : '' )}}"
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
                                                                                   value="{{old('name_en',!empty($bus->name_en) ? $bus->name_en : '' )}}"
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


                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control"
                                                                           for="number_of_seats">{{trans('lang.number_of_seats')}}</label>
                                                                    <div class="col-md-9">
                                                                        <div class="position-relative has-icon-left">
                                                                            <input type="number" id="number_of_seats"
                                                                                   autocomplete="off"
                                                                                   min="0"
                                                                                   value="{{old('number_of_seats',!empty($bus->number_of_seats) ? $bus->number_of_seats : 0 )}}"
                                                                                   class="form-control border-info"
                                                                                   placeholder="{{trans('lang.number_of_seats')}}"
                                                                                   name="number_of_seats">
                                                                            @if ($errors->has('number_of_seats'))
                                                                                <span class="text-danger">{{$errors->first('number_of_seats')}}</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control"
                                                                           for="trip_price">{{trans('lang.trip_price')}}</label>
                                                                    <div class="col-md-9">
                                                                        <div class="position-relative has-icon-left">
                                                                            <input type="number" id="trip_price"
                                                                                   autocomplete="off"
                                                                                   min="0"
                                                                                   step="any"
                                                                                   value="{{old('trip_price',!empty($bus->trip_price) ? $bus->trip_price : 0 )}}"
                                                                                   class="form-control border-info"
                                                                                   placeholder="{{trans('lang.trip_price')}}"
                                                                                   name="trip_price">
                                                                            @if ($errors->has('trip_price'))
                                                                                <span class="text-danger">{{$errors->first('trip_price')}}</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control"
                                                                           for="point">{{trans('lang.point')}}</label>
                                                                    <div class="col-md-9">
                                                                        <div class="position-relative has-icon-left">
                                                                            <input type="number" id="point"
                                                                                   autocomplete="off"
                                                                                   min="0"
                                                                                   step="any"
                                                                                   value="{{old('point',!empty($bus->point) ? $bus->point : 0 )}}"
                                                                                   class="form-control border-info"
                                                                                   placeholder="{{trans('lang.point')}}"
                                                                                   name="point">
                                                                            @if ($errors->has('point'))
                                                                                <span class="text-danger">{{$errors->first('point')}}</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control"
                                                                           for="bus_number">{{trans('lang.bus_number')}}</label>
                                                                    <div class="col-md-9">
                                                                        <div class="position-relative has-icon-left">
                                                                            <input type="number" id="bus_number"
                                                                                   autocomplete="off"
                                                                                   min="0"
                                                                                   value="{{old('bus_number',!empty($bus->bus_number) ? $bus->bus_number : '' )}}"
                                                                                   class="form-control border-info"
                                                                                   placeholder="{{trans('lang.bus_number')}}"
                                                                                   name="bus_number">
                                                                            @if ($errors->has('bus_number'))
                                                                                <span class="text-danger">{{$errors->first('bus_number')}}</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>





                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control"
                                                                           for="name_ar">{{trans('lang.areas')}}</label>
                                                                    <div class="col-md-9">
                                                                        <div class="position-relative has-icon-left">
                                                                            <select name="area_id[]" class="select2 form-control" multiple="multiple">
                                                                                @if(count($areas) > 0)
                                                                                    @foreach($areas as $area)
                                                                                        <option value="{{$area->id}}"
                                                                                            {{ !empty($area_ids) && in_array($area->id,$area_ids) ? "selected" : ""}}>
                                                                                            {{direction() =='ar' ? $area->name_ar : $area->name_en}}
                                                                                        </option>
                                                                                    @endforeach
                                                                                @endif

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-12">

                                                                    <div class="form-body">
                                                                        <div class="repeater-default">
                                                                            <div data-repeater-list="area-data">

                                                                                @if (isset($bus) && !empty($bus))
{{--                                                                                    @foreach($bus->bus_areas as $bus_area)--}}

                                                                                        <div data-repeater-item class="mt-2">

                                                                                            <div class="row">

                                                                                                <div class="col-md-4">
                                                                                                    <div class="form-group row">
                                                                                                        <label class="col-md-3 label-control">{{trans('lang.area')}}</label>
                                                                                                        <div class="col-md-9">
                                                                                                            <div class="position-relative has-icon-left">
                                                                                                                <select class="form-control" name="area_id">
                                                                                                                    @if(!empty($areas))
                                                                                                                        @foreach($areas as $area)
                                                                                                                            <option {{$bus->areas_main[0]->area_id == $area->id  ? 'selected' : ''}} value="{{$area->id}}">
                                                                                                                                {{direction() == 'ar' ? $area->name_ar : $area->name_en}}
                                                                                                                            </option>



                                                                                                                        @endforeach
                                                                                                                    @endif
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="col-md-4">
                                                                                                    <div class="form-group row">
                                                                                                        <label
                                                                                                            class="col-md-3 label-control">{{__('lang.arrival_time')}}</label>
                                                                                                        <div class="col-md-9">
                                                                                                            <div
                                                                                                                class="position-relative has-icon-left">
                                                                                                                <input type="time" id="arrival_time"
                                                                                                                       autocomplete="off"
                                                                                                                       value="{{old('arrival_time',!empty($bus->bus_areas[0]->arrival_time) ? $bus->bus_areas[0]->arrival_time : '' )}}"
                                                                                                                       class="form-control border-teal arrival_time"
                                                                                                                       placeholder="{{__('lang.arrival_time')}}"
                                                                                                                       name="arrival_time">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="col-md-4">
                                                                                                    <div class="form-group row">
                                                                                                        <label class="col-md-3 label-control"
                                                                                                        >{{trans('lang.leave_time')}}</label>
                                                                                                        <div class="col-md-9">
                                                                                                            <div
                                                                                                                class="position-relative has-icon-left">
                                                                                                                <input type="time" id="code"
                                                                                                                       autocomplete="off"
                                                                                                                       value="{{old('leave_time',!empty($bus->bus_areas[0]->leave_time) ? $bus->bus_areas[0]->leave_time : '' )}}"
                                                                                                                       class="form-control border-teal leave_time"
                                                                                                                       placeholder="{{trans('item.leave_time')}}"
                                                                                                                       name="leave_time">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

{{--                                                                                    @endforeach--}}

                                                                                @else

                                                                                    <div data-repeater-item class="mt-2">
                                                                                        <div class="row">

                                                                                            <div class="col-md-4">
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-md-3 label-control">{{trans('lang.area')}}</label>
                                                                                                    <div class="col-md-9">
                                                                                                        <div class="position-relative has-icon-left">
                                                                                                            <select class="form-control" name="area_id">
                                                                                                                @if(!empty($areas))
                                                                                                                    @foreach($areas as $area)
                                                                                                                        <option value="{{$area->id}}">
                                                                                                                            {{direction() == 'ar' ? $area->name_ar : $area->name_en}}
                                                                                                                        </option>

                                                                                                                    @endforeach
                                                                                                                @endif
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-md-4">
                                                                                                <div class="form-group row">
                                                                                                    <label
                                                                                                        class="col-md-3 label-control">{{__('lang.arrival_time')}}</label>
                                                                                                    <div class="col-md-9">
                                                                                                        <div
                                                                                                            class="position-relative has-icon-left">
                                                                                                            <input type="time" id="arrival_time"
                                                                                                                   autocomplete="off"
                                                                                                                   {{--                                                                                                                       value="{{old('nick_name_en',!empty($variant->nick_name_en) ? $variant->nick_name_en : '' )}}"--}}
                                                                                                                   class="form-control border-teal arrival_time"
                                                                                                                   placeholder="{{__('lang.arrival_time')}}"
                                                                                                                   name="arrival_time">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-md-4">
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-md-3 label-control"
                                                                                                    >{{trans('lang.leave_time')}}</label>
                                                                                                    <div class="col-md-9">
                                                                                                        <div
                                                                                                            class="position-relative has-icon-left">
                                                                                                            <input type="time" id="code"
                                                                                                                   autocomplete="off"
                                                                                                                   {{--                                                                                                                       value="{{old('ref_number',!empty($variant->ref_number) ? $variant->ref_number : '' )}}"--}}
                                                                                                                   class="form-control border-teal leave_time"
                                                                                                                   placeholder="{{trans('item.leave_time')}}"
                                                                                                                   name="leave_time">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>


                                                                                        </div>
                                                                                    </div>

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

@push('js')
    <script src="{{theme('app-assets/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>

    <script src="{{theme('app-assets/vendors/js/forms/repeater/jquery.repeater.min.js')}}" type="text/javascript"></script>


    <script>

        (function (window, document, $) {
            'use strict';
            $('.repeater-default').repeater({
                isFirstItemUndeletable: true,

                show: function () {
                    $(this).slideDown();

                    let clone_data = $('.repeater-default').repeaterVal()['area-data'][0];

                    $(this).find('button').attr('value', 0);


                },
                hide: function (remove) {
                    var variant_id = $(this).find('button').attr('value');
                    if (variant_id > 0) {
                        //do delete
                    } else {
                        $(this).slideUp(remove);
                    }
                }
            });


        })(window, document, jQuery);

        $(function () {
            $('.select2').select2({
                dir: "{{direction()=='ar' ? 'rtl' :''}}",
                placeholder: '{{trans('lang.areas')}}',
                closeOnSelect: false,
            });
        });
    </script>
@endpush


@extends('user.index')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{theme('app-assets/css-rtl/plugins/animate/animate.css')}}">
@endpush


@section('content')


<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">{{$title}}</h3>
            </div>
        </div>
        <div class="content-body">
            <!-- Search form-->
            <div id="search-videos" class="card overflow-hidden">

                <div class="card-content">

                    <div class="card-body pb-0">
                        <fieldset class="form-group position-relative mb-0">
                            <form method="get" action="{{url('appointment')}}">
                            <input type="text" value="{{request('search')}}" class="form-control form-control-lg input-lg" name="search" placeholder="{{__('lang.search')}}">
                            <button type="submit" class="form-control-position btn btn-success  " style="top: 0!important;">
                                <i class="ft-search font-medium-4"></i>
                            </button>
                            </form>
                        </fieldset>
                    </div>
                    <!--/Search Form-->

                    <div id="search-results" class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="media-list">
                                    @if(count($trips) > 0)
                                        @foreach($trips as $trip)
                                            <li class="row">
                                                <p class="lead mx-2 mb-0 col-12 ">
                                                    {{direction() == 'ar' ? $trip->bus->name_ar  : $trip->bus->name_en }}
                                                </p>

                                                <div class="col-md-3 col-sm-12">
                                                    <img class="border-0" width="100" height="100" src="{{avatar('bus_logo.png')}}"></img>
                                                </div>
                                                <div class="col-md-9 col-sm-12">

                                                    <ul class="list-inline list-inline-pipe text-muted">
                                                        <li>{{__('lang.number_of_seats')}} : {{$trip->bus->number_of_seats}}</li>
                                                        <li>{{__('lang.available_seats')}} : {{available_seats($trip->bus_id,$trip->id)}}</li>
                                                        <li>{{__('lang.point')}}  : {{$trip->bus->point}}</li>
                                                        <li>{{__('lang.trip_price')}}  : {{$trip->bus->trip_price}}</li>
                                                        <li>{{__('lang.trip_date')}}  : {{$trip->trip_date}}</li>
                                                    </ul>
                                                    <p>
                                                        @foreach($trip->bus->areas as $area)
                                                            {{direction() == 'ar' ? $area->name_ar.' - ' :  $area->name_en.' - ' }}
                                                        @endforeach
                                                    </p>

                                                    @if(auth()->user()->is_active == 1)

                                                        @if(available_seats($trip->bus_id,$trip->id) > 0)
                                                            @if(\App\Models\Appointment::where('trip_id',$trip->id)->where('user_id',auth()->user()->id)->count() == 0 )
                                                                <button  onclick="busInfo('{{$trip->bus_id}}','{{$trip->id}}')" class="btn btn-sm btn-info">{{__('lang.new_appointment')}}</button>
                                                            @else
                                                                <b class="btn btn-sm btn-warning">{{__('lang.developed_already')}}</b>

                                                            @endif
                                                        @else
                                                            <b class="btn btn-sm btn-danger">{{__('lang.bus_if_full')}}</b>
                                                        @endif

                                                    @else
                                                        <b class="btn btn-sm btn-danger">{{__('lang.msg_inactive')}}</b>
                                                    @endif
                                        </div>
                                    </li>
                                            <hr>
                                        @endforeach

                                    @endif
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{{--    Modal--}}


<div class="modal animated slideInDown text-left" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel70" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel70">{{__('lang.new_appointment')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">



                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form" method="post" action="{{url('do_appointment')}}">
                                    @csrf
                                    <input type="hidden" name="bus_id" id="bus_id" value="0">
                                    <input type="hidden" name="trip_id" id="trip_id" value="0">

                                    <div class="form-body">
                                        <h4 class="form-section"><i class="la la-car"></i>
                                        <b id="bus_name"></b>
                                        </h4>
                                        <div class="row text-center">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >{{__('lang.number_of_seats')}}</label> :
                                                    <label id="number_of_seats"></label>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >{{__('lang.available_seats')}}</label> :
                                                    <label id="available_seats"></label>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >{{__('lang.point')}}</label> :
                                                    <label id="point"></label>
                                                </div>
                                            </div>


                                        </div>
                                        <h4 class="form-section"><i class="la la-map-marker"></i> {{__('lang.areas')}}</h4>

                                        <div class="form-group">
                                            <table class="table table-bordered">
                                                <thead>
                                                <th>#</th>
                                                <th>{{__('lang.area')}}</th>
                                                <th>{{__('lang.arrival_time')}}</th>
                                                <th>{{__('lang.leave_time')}}</th>
                                                </thead>
                                                <tbody id="area_body"></tbody>

                                            </table>
                                        </div>
                                    </div>



                                    <h4 class="form-section"><i class="la la-money"></i> {{__('lang.offers')}}</h4>
                                    <table class="table table-bordered text-center">
                                        <tr>
                                            <td>{{__('lang.offer_type')}}</td>
                                            <td>#</td>
                                        </tr>

                                        <tbody>
                                        <tr>
                                            <td>{{__('lang.free_appointment')}}</td>
                                            @if($total_point >= $number_of_point_to_offer)
                                                <td><input class="form-control" type="radio" name="offer" value="free"></td>
                                            @endif
                                        </tr>

                                        <tr>
                                            <td>{{__('lang.offer_by_percent')}} {{\App\Models\Setting::select('offer_percent')->first()->offer_percent."%"}}</td>
                                            @if($total_point >= $number_of_point_to_free)
                                            <td>
                                                <input class="form-control" type="radio" name="offer" value="discount">
                                            </td>
                                            @endif
                                        </tr>

                                        </tbody>
                                    </table>



                                    <div class="form-actions text-center">

                                        <button type="submit" class="btn btn-success">
                                            <i class="la la-check-square-o"></i>
                                            {{__('lang.do_appointment')}}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>
</div>



@endsection

@push('js')
    <script>
        function busInfo(bus_id,trip_id){

            $.ajax({
                url: '{{url('bus/info')}}',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                dataType: 'json',
                data: {bus_id: bus_id,trip_id:trip_id},
                success: function (data) {
                    console.log(data)
                    $("#bus_id").html("").val(bus_id);
                    $("#trip_id").html("").val(trip_id);
                    $("#bus_name").html("").html(data.name_ar);
                    $("#number_of_seats").html("").html(data.number_of_seats);
                    $("#available_seats").html("").html(data.available_seats);
                    $("#point").html("").html(data.point);

                    let html='';
                    $.each(data['area'],function (key,val){
                        html+='<tr>';
                        html+='<td><input class="form-control" type="radio" name="area_id" value="'+data['area'][key]['id']+'"></td>';
                        html+='<td>'+data['area'][key]['name_ar']+'</td>';

                        $.each(data['bus_areas'],function (k,v) {

                            if(data['bus_areas'][k]['area_id'] == data['area'][key]['id']){

                                if(data['bus_areas'][key]['arrival_time'] ==null ){
                                    html+='<td></td>';
                                    html+='<td></td>';
                                }else{
                                    html+='<td>'+data['bus_areas'][key]['arrival_time']+'</td>';
                                    html+='<td>'+data['bus_areas'][key]['leave_time']+'</td>';

                                }

                            }

                        });
                        html+='</tr>';

                    });
                    $("#area_body").html("").html(html);
                    $("#info").modal('show');
                }
            });

        }

        localStorage.setItem('login',1);
    </script>


@endpush

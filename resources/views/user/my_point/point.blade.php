@extends('user.index')


@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- eCommerce statistic -->
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="info">{{$pending_trip}}</h3>
                                            <h6>{{__('lang.pending_trip')}}</h6>
                                        </div>
                                        <div>
                                            <i class="icon-basket-loaded info font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: {{$pending_trip}}%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="warning">{{$finish_trip}}</h3>
                                            <h6>{{__('lang.finish_trip')}}</h6>
                                        </div>
                                        <div>
                                            <i class="icon-pie-chart warning font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: {{$finish_trip}}%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="success">{{$cancel_trip}}</h3>
                                            <h6>{{__('lang.cancel_trip')}}</h6>
                                        </div>
                                        <div>
                                            <i class="icon-user-follow success font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: {{$cancel_trip}}%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="danger">{{$total_point}}</h3>
                                            <h6>{{__('lang.my_point')}}</h6>
                                        </div>
                                        <div>
                                            <i class="icon-heart danger font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: {{$total_point}}%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div id="recent-transactions" class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{__('lang.all_appointment')}}</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table id="recent-orders" class="table table-hover table-xl mb-0">
                                        <thead>
                                        <tr>
                                            <th class="border-top-0">{{__('lang.name')}}</th>
                                            <th class="border-top-0">{{__('lang.point')}}</th>
                                            <th class="border-top-0">{{__('lang.area')}}</th>
                                            <th class="border-top-0">{{__('lang.status')}}</th>
                                            <th class="border-top-0">{{__('lang.manage')}}</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($appointments) > 0)
                                            @foreach($appointments as $appointment)
                                        <tr>

                                            <td class="text-truncate">{{direction() == 'ar' ? $appointment->trip->bus->name_ar : $appointment->trip->bus->name_en}}</td>
                                            <td class="text-truncate">{{$appointment->trip->bus->point }}</td>
                                            <td class="text-truncate">{{direction() =='ar' ? $appointment->area->name_ar : $appointment->area->name_en }}</td>
                                            <td>
                                                @if($appointment->status == 'cancel')
                                                <button type="button" class="btn btn-sm btn-outline-danger round">{{__('lang.cancel')}}</button>
                                                @elseif($appointment->status == 'finished')
                                                    <button type="button" class="btn btn-sm btn-outline-success round">{{__('lang.complete')}}</button>
                                                @else
                                                    <button type="button" class="btn btn-sm btn-outline-warning round">{{__('lang.pending')}}</button>
                                                @endif

                                            </td>

                                            <td>
                                                @if($appointment->status == 'pending')

                                                <a href="{{url('cancel_appointment/'.$appointment->id)}}" class="btn btn-danger btn-sm"><i class="la la-trash"></i>
                                                    {{__('lang.cancel_appointment')}}
                                                </a>
                                                @endif
                                            </td>
                                        </tr>

                                            @endforeach
                                        @endif

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

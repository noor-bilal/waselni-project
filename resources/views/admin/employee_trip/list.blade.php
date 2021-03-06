@extends('admin.index')

@push('css')
    <link rel="stylesheet" type="text/css"
          href="{{theme('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{theme('app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{theme('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">

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


                <section id="html5">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">

                                        <div class="row">
                                            <div class="col-6  text-center my-auto">
                                                {!! QrCode::size(150)->generate(url('admin/trip/updateStatus/')); !!}

                                            </div>

                                            <div class="col-6">
                                                <div class="list-group">
                                                    <a href="#" class="list-group-item list-group-item-action">
                                                        <h5 class="list-group-item-heading">{{__('lang.bus_number')}}</h5>
                                                        <p class="list-group-item-text">{{$trip->bus->bus_number}}</p>
                                                    </a>
                                                    <a href="#" class="list-group-item list-group-item-action">
                                                        <h5 class="list-group-item-heading">{{__('lang.point')}}</h5>
                                                        <p class="list-group-item-text">{{$trip->bus->point}}</p>
                                                    </a>
                                                    <a href="#" class="list-group-item list-group-item-action">
                                                        <h5 class="list-group-item-heading">{{__('lang.trip_price')}}</h5>
                                                        <p class="list-group-item-text">{{$trip->bus->trip_price}}</p>
                                                    </a>
                                                    <a href="#" class="list-group-item list-group-item-action">
                                                        <h5 class="list-group-item-heading">{{__('lang.number_of_seats')}}</h5>
                                                        <p class="list-group-item-text">{{$trip->bus->number_of_seats}}</p>
                                                    </a>

                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <section id="html5">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered dataex-html5-export text-center">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{__('lang.name')}}</th>
                                                <th>{{__('lang.status')}}</th>
                                                <th>{{__('lang.offers')}}</th>
                                                <th>{{__('lang.manage')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>


                                            @if(!empty($users))
                                                @foreach($users as  $appointment)
                                                @foreach($appointment->user as $user)
                                                    <tr>
                                                        <td>{{$user->id}}</td>
                                                        <td>{{$user->name}}</td>
                                                        <td>
                                                            @if($appointment->status == 'cancel')
                                                                <button type="button" class="btn btn-sm btn-outline-danger round">{{__('lang.cancel')}}</button>
                                                            @elseif($appointment->status == 'finished')
                                                                <button type="button" class="btn btn-sm btn-outline-success round">{{__('lang.complete')}}</button>
                                                            @else
                                                                <button type="button" class="btn btn-sm btn-outline-warning round">{{__('lang.pending')}}</button>
                                                            @endif
                                                        </td>
                                                        <td>@if($appointment->offer_type == 'free')
                                                                {{__('lang.free_appointment')}}

                                                            @elseif($appointment->offer_type == 'discount')
                                                                {{__('lang.offer_by_percent')}}
                                                            @else

                                                            @endif

                                                        </td>

                                                        <td>

                                                            @if($appointment->status == "pending")
                                                            <a href="{{url('admin/trip/change_status/finished/'.$trip->id.'/'.$user->id)}}" class="btn btn-success btn-sm"><i class="la la-check"></i>
                                                                {{__('lang.complete')}}
                                                            </a>

                                                            <a href="{{url('admin/trip/change_status/cancel/'.$trip->id.'/'.$user->id)}}" class="btn btn-danger btn-sm"><i class="la la-trash"></i>
                                                                {{__('lang.cancel')}}
                                                            </a>
                                                            @endif


                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @endforeach
                                            @endif

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>{{__('lang.name')}}</th>
                                                <th>{{__('lang.status')}}</th>
                                                <th>{{__('lang.offers')}}</th>
                                                <th>{{__('lang.manage')}}</th>
                                            </tr>


                                            </tfoot>
                                        </table>
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

    <script src="{{theme('app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{theme('app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"
            type="text/javascript"></script>
    <script src="{{theme('app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js')}}"
            type="text/javascript"></script>
    <script src="{{theme('app-assets/vendors/js/tables/vfs_fonts.js')}}" type="text/javascript"></script>
    <script src="{{theme('app-assets/vendors/js/tables/buttons.html5.min.js')}}" type="text/javascript"></script>
    <script src="{{theme('app-assets/vendors/js/tables/buttons.print.min.js')}}" type="text/javascript"></script>
    <script src="{{theme('app-assets/vendors/js/tables/buttons.colVis.min.js')}}" type="text/javascript"></script>

    @if(direction() =='ar')
        <script>
            $(function () {
                $('.dataex-html5-export').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'excelHtml5',
                        'csvHtml5',
                    ],
                    'language': {
                        "loadingRecords": "???????? ??????????????...",
                        "lengthMenu": "???????? _MENU_ ????????????",
                        "zeroRecords": "???? ???????? ?????? ?????? ??????????",
                        "info": "?????????? _START_ ?????? _END_ ???? ?????? _TOTAL_ ????????",
                        "infoFiltered": "(???????????? ???? ?????????? _MAX_ ??????????)",
                        "search": "????????:",
                        "paginate": {
                            "first": "??????????",
                            "previous": "????????????",
                            "next": "????????????",
                            "last": "????????????"
                        },
                        "aria": {
                            "sortAscending": ": ?????????? ???????????? ???????????? ????????????????",
                            "sortDescending": ": ?????????? ???????????? ???????????? ????????????????"
                        },
                        "select": {
                            "rows": {
                                "_": "%d ???????? ??????????",
                                "1": "1 ???????? ??????????"
                            },
                            "cells": {
                                "1": "1 ???????? ??????????",
                                "_": "%d ?????????? ??????????"
                            },
                            "columns": {
                                "1": "1 ???????? ????????",
                                "_": "%d ?????????? ??????????"
                            }
                        },
                        "buttons": {
                            "print": "??????????",
                            "copyKeys": "???? <i>ctrl<\/i> ???? <i>???<\/i> + <i>C<\/i> ???? ????????????<br>???????? ?????????? ?????? ??????????????<br><br>?????????????? ???????? ?????? ?????????????? ???? ???????? ?????? ???? ????????????.",
                            "pageLength": {
                                "-1": "?????????? ????????",
                                "_": "?????????? %d ????????"
                            },
                            "collection": "????????????",
                            "copy": "??????",
                            "copyTitle": "?????? ?????? ??????????????",
                            "csv": "CSV",
                            "excel": "Excel",
                            "pdf": "PDF",
                            "colvis": "?????????? ??????????????",
                            "colvisRestore": "?????????????? ??????????",
                            "copySuccess": {
                                "1": "???? ?????? ?????? ???????? ?????? ??????????????",
                                "_": "???? ?????? %ds ???????? ?????? ??????????????"
                            }
                        },
                        "autoFill": {
                            "cancel": "??????????",
                            "fill": "???????? ???????? ???????????? ???? <i>%d&lt;\\\/i&gt;<\/i>",
                            "fillHorizontal": "?????????? ???????????? ????????????",
                            "fillVertical": "?????????? ???????????? ????????????"
                        },
                        "searchBuilder": {
                            "add": "?????????? ??????",
                            "clearAll": "?????????? ????????",
                            "condition": "??????????",
                            "data": "????????????????",
                            "logicAnd": "??",
                            "logicOr": "????",
                            "title": [
                                "???????? ??????????"
                            ],
                            "value": "????????????",
                            "conditions": {
                                "date": {
                                    "after": "??????",
                                    "before": "??????",
                                    "between": "??????",
                                    "empty": "????????",
                                    "equals": "??????????",
                                    "not": "??????",
                                    "notBetween": "???????? ??????",
                                    "notEmpty": "???????? ??????????"
                                },
                                "number": {
                                    "between": "??????",
                                    "empty": "??????????",
                                    "equals": "??????????",
                                    "gt": "???????? ????",
                                    "gte": "???????? ????????????",
                                    "lt": "?????? ????",
                                    "lte": "?????? ????????????",
                                    "not": "????????",
                                    "notBetween": "???????? ??????",
                                    "notEmpty": "???????? ??????????"
                                },
                                "string": {
                                    "contains": "??????????",
                                    "empty": "??????",
                                    "endsWith": "?????????? ??",
                                    "equals": "??????????",
                                    "not": "????????",
                                    "notEmpty": "???????? ??????????",
                                    "startsWith": " ???????? ???? "
                                }
                            },
                            "button": {
                                "0": "?????????? ??????????",
                                "_": "?????????? ?????????? (%d)"
                            },
                            "deleteTitle": "?????? ??????????"
                        },
                        "searchPanes": {
                            "clearMessage": "?????????? ????????",
                            "collapse": {
                                "0": "??????",
                                "_": "?????? (%d)"
                            },
                            "count": "??????",
                            "countFiltered": "?????? ??????????????",
                            "loadMessage": "???????? ?????????????? ...",
                            "title": "?????????????? ????????????"
                        },
                        "infoThousands": ",",
                        "datetime": {
                            "previous": "????????????",
                            "next": "????????????",
                            "hours": "????????????",
                            "minutes": "??????????????",
                            "seconds": "??????????????",
                            "unknown": "-",
                            "amPm": [
                                "??????????",
                                "??????????"
                            ],
                            "weekdays": [
                                "??????????",
                                "??????????????",
                                "????????????????",
                                "????????????????",
                                "????????????",
                                "????????????",
                                "??????????"
                            ],
                            "months": [
                                "??????????",
                                "????????????",
                                "????????",
                                "??????????",
                                "????????",
                                "??????????",
                                "??????????",
                                "??????????",
                                "????????????",
                                "????????????",
                                "????????????",
                                "????????????"
                            ]
                        },
                        "editor": {
                            "close": "??????????",
                            "create": {
                                "button": "??????????",
                                "title": "?????????? ??????????",
                                "submit": "??????????"
                            },
                            "edit": {
                                "button": "??????????",
                                "title": "?????????? ??????????",
                                "submit": "??????????"
                            },
                            "remove": {
                                "button": "??????",
                                "title": "??????",
                                "submit": "??????",
                                "confirm": {
                                    "_": "???? ?????? ?????????? ???? ?????????? ???? ?????? ?????????????? %d ????????????????",
                                    "1": "???? ?????? ?????????? ???? ?????????? ???? ?????? ????????????"
                                }
                            },
                            "error": {
                                "system": "?????? ?????? ????"
                            },
                            "multi": {
                                "title": "?????? ????????????",
                                "restore": "??????????"
                            }
                        },
                        "processing": "???????? ????????????????...",
                        "emptyTable": "???? ???????? ???????????? ?????????? ???? ????????????",
                        "infoEmpty": "???????? 0 ?????? 0 ???? ?????? 0 ??????????",
                        "thousands": "."
                    }
                });
            });

        </script>

    @else
        <script>
            $(function () {
                $('.dataex-html5-export').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'excelHtml5',
                        'csvHtml5',
                    ],
                });
            });

        </script>

    @endif

@endpush

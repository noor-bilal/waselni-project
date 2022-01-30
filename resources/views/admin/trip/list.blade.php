@extends('admin.index')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{theme('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{theme('app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{theme('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">

@endpush

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">{{$title}}</h3>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right">
                        <a href="{{url('admin/trip/get')}}" class="btn btn-info round dropdown-menu-right box-shadow-2 px-2" >
                            <i class="ft-plus icon-left"></i>
                            {{__('lang.add')}}
                        </a>
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
                                        <table class="table table-striped table-bordered dataex-html5-export">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{__('lang.bus')}}</th>
                                                <th>{{__('lang.trip_date')}}</th>
                                                <th>{{__('lang.status')}}</th>
                                                <th>{{__('lang.manage')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>


                                            @if(count($trips) > 0)
                                                @foreach($trips as $trip)
                                                    <tr>
                                                        <td>{{$trip->id}}</td>
                                                        <td>{{$trip->bus->name_ar}}</td>
                                                        <td>{{$trip->trip_date}}</td>
                                                        <td>{{$trip->status == 1 ? __('lang.active') : __('lang.inactive')}}</td>
                                                        <td>
                                                            <a href="{{url('admin/trip/get/'.$trip->id)}}" class="btn btn-success btn-sm"><i class="la la-edit"></i>
                                                                {{__('lang.edit')}}</a>


                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>{{__('lang.bus')}}</th>
                                                <th>{{__('lang.trip_date')}}</th>
                                                <th>{{__('lang.status')}}</th>
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
    <script src="{{theme('app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}" type="text/javascript"></script>
    <script src="{{theme('app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js')}}" type="text/javascript"></script>
    <script src="{{theme('app-assets/vendors/js/tables/vfs_fonts.js')}}" type="text/javascript"></script>
    <script src="{{theme('app-assets/vendors/js/tables/buttons.html5.min.js')}}" type="text/javascript"></script>
    <script src="{{theme('app-assets/vendors/js/tables/buttons.print.min.js')}}" type="text/javascript"></script>
    <script src="{{theme('app-assets/vendors/js/tables/buttons.colVis.min.js')}}" type="text/javascript"></script>

    @if(direction() =='ar')
        <script>
            $(function (){
                $('.dataex-html5-export').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'excelHtml5',
                        'csvHtml5',
                    ],
                    'language':{
                        "loadingRecords": "جارٍ التحميل...",
                        "lengthMenu": "أظهر _MENU_ مدخلات",
                        "zeroRecords": "لم يعثر على أية سجلات",
                        "info": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                        "infoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                        "search": "ابحث:",
                        "paginate": {
                            "first": "الأول",
                            "previous": "السابق",
                            "next": "التالي",
                            "last": "الأخير"
                        },
                        "aria": {
                            "sortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                            "sortDescending": ": تفعيل لترتيب العمود تنازلياً"
                        },
                        "select": {
                            "rows": {
                                "_": "%d قيمة محددة",
                                "1": "1 قيمة محددة"
                            },
                            "cells": {
                                "1": "1 خلية محددة",
                                "_": "%d خلايا محددة"
                            },
                            "columns": {
                                "1": "1 عمود محدد",
                                "_": "%d أعمدة محددة"
                            }
                        },
                        "buttons": {
                            "print": "طباعة",
                            "copyKeys": "زر <i>ctrl<\/i> أو <i>⌘<\/i> + <i>C<\/i> من الجدول<br>ليتم نسخها إلى الحافظة<br><br>للإلغاء اضغط على الرسالة أو اضغط على زر الخروج.",
                            "pageLength": {
                                "-1": "اظهار الكل",
                                "_": "إظهار %d أسطر"
                            },
                            "collection": "مجموعة",
                            "copy": "نسخ",
                            "copyTitle": "نسخ إلى الحافظة",
                            "csv": "CSV",
                            "excel": "Excel",
                            "pdf": "PDF",
                            "colvis": "إظهار الأعمدة",
                            "colvisRestore": "إستعادة العرض",
                            "copySuccess": {
                                "1": "تم نسخ سطر واحد الى الحافظة",
                                "_": "تم نسخ %ds أسطر الى الحافظة"
                            }
                        },
                        "autoFill": {
                            "cancel": "إلغاء",
                            "fill": "املأ جميع الحقول بـ <i>%d&lt;\\\/i&gt;<\/i>",
                            "fillHorizontal": "تعبئة الحقول أفقيًا",
                            "fillVertical": "تعبئة الحقول عموديا"
                        },
                        "searchBuilder": {
                            "add": "اضافة شرط",
                            "clearAll": "ازالة الكل",
                            "condition": "الشرط",
                            "data": "المعلومة",
                            "logicAnd": "و",
                            "logicOr": "أو",
                            "title": [
                                "منشئ البحث"
                            ],
                            "value": "القيمة",
                            "conditions": {
                                "date": {
                                    "after": "بعد",
                                    "before": "قبل",
                                    "between": "بين",
                                    "empty": "فارغ",
                                    "equals": "تساوي",
                                    "not": "ليس",
                                    "notBetween": "ليست بين",
                                    "notEmpty": "ليست فارغة"
                                },
                                "number": {
                                    "between": "بين",
                                    "empty": "فارغة",
                                    "equals": "تساوي",
                                    "gt": "أكبر من",
                                    "gte": "أكبر وتساوي",
                                    "lt": "أقل من",
                                    "lte": "أقل وتساوي",
                                    "not": "ليست",
                                    "notBetween": "ليست بين",
                                    "notEmpty": "ليست فارغة"
                                },
                                "string": {
                                    "contains": "يحتوي",
                                    "empty": "فاغ",
                                    "endsWith": "ينتهي ب",
                                    "equals": "يساوي",
                                    "not": "ليست",
                                    "notEmpty": "ليست فارغة",
                                    "startsWith": " تبدأ بـ "
                                }
                            },
                            "button": {
                                "0": "فلاتر البحث",
                                "_": "فلاتر البحث (%d)"
                            },
                            "deleteTitle": "حذف فلاتر"
                        },
                        "searchPanes": {
                            "clearMessage": "ازالة الكل",
                            "collapse": {
                                "0": "بحث",
                                "_": "بحث (%d)"
                            },
                            "count": "عدد",
                            "countFiltered": "عدد المفلتر",
                            "loadMessage": "جارِ التحميل ...",
                            "title": "الفلاتر النشطة"
                        },
                        "infoThousands": ",",
                        "datetime": {
                            "previous": "السابق",
                            "next": "التالي",
                            "hours": "الساعة",
                            "minutes": "الدقيقة",
                            "seconds": "الثانية",
                            "unknown": "-",
                            "amPm": [
                                "صباحا",
                                "مساءا"
                            ],
                            "weekdays": [
                                "الأحد",
                                "الإثنين",
                                "الثلاثاء",
                                "الأربعاء",
                                "الخميس",
                                "الجمعة",
                                "السبت"
                            ],
                            "months": [
                                "يناير",
                                "فبراير",
                                "مارس",
                                "أبريل",
                                "مايو",
                                "يونيو",
                                "يوليو",
                                "أغسطس",
                                "سبتمبر",
                                "أكتوبر",
                                "نوفمبر",
                                "ديسمبر"
                            ]
                        },
                        "editor": {
                            "close": "إغلاق",
                            "create": {
                                "button": "إضافة",
                                "title": "إضافة جديدة",
                                "submit": "إرسال"
                            },
                            "edit": {
                                "button": "تعديل",
                                "title": "تعديل السجل",
                                "submit": "تحديث"
                            },
                            "remove": {
                                "button": "حذف",
                                "title": "حذف",
                                "submit": "حذف",
                                "confirm": {
                                    "_": "هل أنت متأكد من رغبتك في حذف السجلات %d المحددة؟",
                                    "1": "هل أنت متأكد من رغبتك في حذف السجل؟"
                                }
                            },
                            "error": {
                                "system": "حدث خطأ ما"
                            },
                            "multi": {
                                "title": "قيم متعدية",
                                "restore": "تراجع"
                            }
                        },
                        "processing": "جارٍ المعالجة...",
                        "emptyTable": "لا يوجد بيانات متاحة في الجدول",
                        "infoEmpty": "يعرض 0 إلى 0 من أصل 0 مُدخل",
                        "thousands": "."
                    }
                });
            });

        </script>

    @else
        <script>
            $(function (){
                $('.dataex-html5-export').DataTable( {
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

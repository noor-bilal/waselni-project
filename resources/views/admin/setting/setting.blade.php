@extends('admin.index')


@section('content')


    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">{{$title}}</h3>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card" >
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" method="post" action="{{url('admin/update_setting')}}">
                                            @csrf
                                            <div class="form-body">
                                                <h4 class="form-section">
                                                    <i class="la la-money"></i>
                                                    {{__('lang.offers')}}
                                                </h4>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="number_of_point_to_free">{{__('lang.number_of_point_to_free')}}</label>
                                                            <input type="number"
                                                                   value="{{old('number_of_point_to_free',$setting->number_of_point_to_free)}}"
                                                                   id="number_of_point_to_free" class="form-control"
                                                                   placeholder="{{__('lang.number_of_point_to_free')}}" name="number_of_point_to_free">
                                                            @if ($errors->has('number_of_point_to_free'))
                                                                <span class="text-danger">{{$errors->first('number_of_point_to_free')}}</span>
                                                            @endif
                                                        </div>
                                                    </div>



                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="number_of_point_to_offer">{{__('lang.number_of_point_to_offer')}}</label>
                                                            <input type="number"
                                                                   value="{{old('number_of_point_to_offer',$setting->number_of_point_to_offer)}}"
                                                                   id="number_of_point_to_offer" class="form-control"
                                                                   placeholder="{{__('lang.number_of_point_to_offer')}}" name="number_of_point_to_offer">
                                                            @if ($errors->has('number_of_point_to_offer'))
                                                                <span class="text-danger">{{$errors->first('number_of_point_to_offer')}}</span>
                                                            @endif
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="offer_percent">{{__('lang.offer_percent')}}</label>
                                                            <input type="number"
                                                                   value="{{old('offer_percent',$setting->offer_percent)}}"
                                                                   id="offer_percent" class="form-control"
                                                                   placeholder="{{__('lang.offer_percent')}}" name="offer_percent">
                                                            @if ($errors->has('offer_percent'))
                                                                <span class="text-danger">{{$errors->first('offer_percent')}}</span>
                                                            @endif
                                                        </div>
                                                    </div>




                                                </div>


                                                <div class="form-group">
                                                    <label for="about_us">{{__('lang.about_us')}}</label>
                                                    <textarea rows="5" class="form-control" name="about_us" style="resize: none" id="about_us" placeholder="{{__('lang.about_us')}}">{{old('about_us',$setting->about_us)}}</textarea>
                                                    @if ($errors->has('about_us'))
                                                        <span class="text-danger">{{$errors->first('about_us')}}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-actions text-center">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="la la-check-square-o"></i>
                                                    {{__('lang.save')}}
                                                </button>
                                            </div>
                                        </form>
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

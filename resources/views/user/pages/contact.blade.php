<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{env('APP_NAME')}}</title>

    <!-- css -->
    <link href="{{asset('web/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('web/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('web/css/nivo-lightbox.css')}}" rel="stylesheet" />
    <link href="{{asset('web/css/nivo-lightbox-theme/default/default.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('web/css/owl.carousel.css')}}" rel="stylesheet" media="screen" />
    <link href="{{asset('web/css/owl.theme.css')}}" rel="stylesheet" media="screen" />
    <link href="{{asset('web/css/flexslider.css')}}" rel="stylesheet" />
    <link href="{{asset('web/css/slippry.css')}}" rel="stylesheet" >
    <link href="{{asset('web/css/animate.css')}}" rel="stylesheet" />
    <link href="{{asset('web/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('web/color/default.css')}}" rel="stylesheet">

    <style>
        .custom-box-content{
            color: #0a001f; width: 100px; height: 300px;    margin-top: 50px;
            position: absolute; top: 10% ;left:  16%;
            font-size: 18px;
            font-weight: bold
        }

        .custom-box-slider{
            width: 150px;  height: 150px;color: #ffffff;
            background-color: rgba(255,255,255,0.59);
            text-align: center;
            position: absolute;
            padding: 0.4em 1em;
            border-radius: 50%;
            top: 30%;
            z-index: 13;
            left: 70%;

        }
    </style>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

<!-- page loader -->
<div id="page-loader">
    <div class="loader">
        <div class="spinner">
            <div class="spinner-container con1">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
            </div>
            <div class="spinner-container con2">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
            </div>
            <div class="spinner-container con3">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
            </div>
        </div>
    </div>
</div>
<!-- /page loader -->

<!-- Section: home slide -->
<section id="intro" class="home-slide text-light">
    <ul id="valera-slippry">
        <li>
            <div>
                <img src="{{asset('web/images/slide1.jpg!d')}}">
                <div  class="custom-box-slider">
                    <a class="custom-box-content" href="{{url('/')}}" >الرئيسية</a>
                </div>

                <div  style="left:60%!important;" class="custom-box-slider">
                    <a  class="custom-box-content"  href="{{url('service')}}">الخدمات</a>
                </div>


                <div style="left:50%!important;" class="custom-box-slider">
                    <a class="custom-box-content" href="{{url('feature')}}" >الميزات</a>
                </div>


                <div style="left:40%!important;" class="custom-box-slider">
                    <a class="custom-box-content"  href="{{url('contact')}}">اتصل بنا</a>
                </div>



                <div style="left:30%!important;" class="custom-box-slider">
                    <a class="custom-box-content"  href="{{ url('login') }}">تسجيل الدخول</a>
                </div>

                <div style="left:20%!important;" class="custom-box-slider">
                    <a class="custom-box-content"  href="{{ url('register') }}" >تسجيل</a>
                </div>



            </div>
        </li>
        <li>
            <div><img src="{{asset('web/images/slide2.jpeg')}}"  alt="">
                <div  class="custom-box-slider">
                    <a class="custom-box-content" href="{{url('/')}}" >الرئيسية</a>
                </div>

                <div  style="left:60%!important;" class="custom-box-slider">
                    <a  class="custom-box-content"  href="{{url('service')}}">الخدمات</a>
                </div>


                <div style="left:50%!important;" class="custom-box-slider">
                    <a class="custom-box-content" href="{{url('feature')}}" >الميزات</a>
                </div>


                <div style="left:40%!important;" class="custom-box-slider">
                    <a class="custom-box-content"  href="{{url('contact')}}">اتصل بنا</a>
                </div>



                <div style="left:30%!important;" class="custom-box-slider">
                    <a class="custom-box-content"  href="{{ url('login') }}">تسجيل الدخول</a>
                </div>

                <div style="left:20%!important;" class="custom-box-slider">
                    <a class="custom-box-content"  href="{{ url('register') }}" >تسجيل</a>
                </div>


            </div>
        </li>
        <li>
            <div><img src="{{asset('web/images/slide3.jpg')}}" alt="">
                <div  class="custom-box-slider">
                    <a class="custom-box-content" href="{{url('/')}}" >الرئيسية</a>
                </div>

                <div  style="left:60%!important;" class="custom-box-slider">
                    <a  class="custom-box-content"  href="{{url('service')}}">الخدمات</a>
                </div>


                <div style="left:50%!important;" class="custom-box-slider">
                    <a class="custom-box-content" href="{{url('feature')}}" >الميزات</a>
                </div>


                <div style="left:40%!important;" class="custom-box-slider">
                    <a class="custom-box-content"  href="{{url('contact')}}">اتصل بنا</a>
                </div>



                <div style="left:30%!important;" class="custom-box-slider">
                    <a class="custom-box-content"  href="{{ url('login') }}">تسجيل الدخول</a>
                </div>

                <div style="left:20%!important;" class="custom-box-slider">
                    <a class="custom-box-content"  href="{{ url('register') }}" >تسجيل</a>
                </div>


            </div>
        </li>
    </ul>
</section>



<!-- Section: contact -->
<section id="contact" class="home-section nopadd-bot color-dark bg-white text-center">
    <div class="container marginbot-50">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
                    <div class="section-heading text-center">
                        <h2 class="h-bold">Contact us</h2>
                        <div class="divider-header"></div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container">

        <div class="row marginbot-80">
            <div class="col-md-8 col-md-offset-2">
                <form id="contact-form" method="post" action="{{url('complaint/send')}}" class="wow bounceInUp" data-wow-offset="10" data-wow-delay="0.2s">
                    {{csrf_field()}}
                    <div class="row marginbot-20">
                        <div class="col-md-6 xs-marginbot-20">
                            <input type="text" class="form-control input-lg" name="name" id="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control input-lg" id="email" name="email" placeholder="Enter email" required="required" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" id="subject" placeholder="Mobile" name="phone" required="required" />
                            </div>
                            <div class="form-group">
									<textarea name="complaint" id="message"  class="form-control" rows="4" cols="25" required="required"
                                              placeholder="Message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-skin btn-lg btn-block" id="btnContactUs">
                                Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
</section>
<!-- /Section: contact -->

<!-- google map -->
<div id="map-btn1-div">
    <a id="map-btn1" class="gmap-btn close-map-button btn-show" href="#map">
        Click here to open the map
    </a>
</div>
<a id="map-btn2" class="btn btn-skin btn-lg btn-noradius gmap-btn close-map-button btn-hide" href="#map" title="Close google map" data-toggle="tooltip" data-placement="top">
    Close</a>

<!-- google map -->
<section id="map" class="close-map">
    <div id="google-map"></div>
</section>
<!-- /google map -->


<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                <div class="text-center">
                    <a href="#intro" class="totop"><i class="pe-7s-angle-up pe-3x"></i></a>
                    <p>
                        &copy;Copyright 2021 - {{env('APP_NAME')}}</p>

                </div>
            </div>
        </div>
    </div>
</footer>



<!-- Core JavaScript Files -->
<script src="{{asset('web/js/jquery.min.js')}}"></script>
<script src="{{asset('web/js/bootstrap.min.js')}}"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="{{asset('web/js/jquery.sticky.js')}}"></script>
<script src="{{asset('web/js/slippry.min.js')}}"></script>
<script src="{{asset('web/js/jquery.flexslider-min.js')}}"></script>
<script src="{{asset('web/js/morphext.min.js')}}"></script>
<script src="{{asset('web/js/gmap.js')}}"></script>
<script src="{{asset('web/js/jquery.mb.YTPlayer.js')}}"></script>
<script src="{{asset('web/js/jquery.easing.min.js')}}"></script>
<script src="{{asset('web/js/jquery.scrollTo.js')}}"></script>
<script src="{{asset('web/js/jquery.appear.js')}}"></script>
<script src="{{asset('web/js/stellar.js')}}"></script>
<script src="{{asset('web/js/wow.min.js')}}"></script>
<script src="{{asset('web/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('web/js/nivo-lightbox.min.js')}}"></script>
<script src="{{asset('web/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('web/js/custom.js')}}"></script>
</body>

</html>

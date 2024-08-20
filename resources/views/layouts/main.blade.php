<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Dinas Ketahanan Pangan" />
    <meta name="description" content="Dinas KPKP" />
    <meta name="author" content="FRS" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} - Dinas KPKP</title>

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/flaticon.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/themify-icons.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/prettyPhoto.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/shortcodes.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/megamenu.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}" />
</head>


<body>

    <!--page start-->
    <div class="page">



        <!--header start-->
        <header id="masthead" class="header ttm-header-style-01">

            @include('partials.navbar')

            @yield('banner')

            <!--site-main start-->
            <div class="site-main">

                @yield('main')

            </div>
            <!--site-main end-->


            <!--footer start-->
            <footer class="footer widget-footer ttm-bgcolor-darkgrey ttm-textcolor-white clearfix">
                <div class="second-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 widget-area">
                                <div class="widget widget_text clearfix">
                                    <div class="footer-logo">
                                        <img id="footer-logo-img" class="img-fluid auto_size" height="46"
                                            width="170" src="{{ asset('images/logo.png') }}" alt="image">
                                    </div>
                                    <div class="textwidget widget-text">
                                        <p>Website Resmi Dinas Ketahanan Pangan, Kelautan dan Pertanian Provinsi DKI
                                            Jakarta
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                                <div class="widget widget_img_gellary clearfix">
                                    <h3 class="widget-title">Map</h3>
                                    <ul>
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1402.4947017828206!2d106.83509898306956!3d-6.150293727716026!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5ec01cad993%3A0xcad302cb376410af!2sDinas%20Ketahanan%20Pangan%2C%20Kelautan%20dan%20Pertanian%20Provinsi%20DKI%20Jakarta!5e0!3m2!1sid!2sid!4v1689697909341!5m2!1sid!2sid"
                                            width="800" height="200" style="border:0;" allowfullscreen=""
                                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 widget-area">
                                <div class="widget widget_cta clearfix">
                                    <h3 class="widget-title">Kontak</h3>
                                    <div class="d-flex">
                                        <div
                                            class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-xs margin_right15 margin_bottom15 ">
                                            <i class="flaticon flaticon-call"></i>
                                        </div>
                                        <h4>(021) 6007251</h4>
                                    </div>
                                    <p>Jl. Gunung Sahari Raya, No 11, Jakarta Pusat, Indonesia, 10720</p>
                                    <div class="d-inline-table align-items-center justify-content-between">
                                        <a class="ttm-btn btn-inline ttm-btn-size-sm ttm-icon-btn-right ttm-btn-color-skincolor margin_right40 margin_bottom5"
                                            target="_blank" href="https://goo.gl/maps/THe4tvBFoLZvyfDq8">Dapatkan arah
                                            <i class="fa fa-chevron-right"></i></a>
                                        <div class="social-icons d-inline-block margin_top10 margin_bottom10">
                                            <ul class="social-icons list-inline">
                                                <li><a class="tooltip-top" target="_blank"
                                                        href="https://www.instagram.com/dkpkp.jakarta/" rel="noopener"
                                                        aria-label="instagram" data-tooltip="Instagram"><i
                                                            class="fa fa-instagram"></i></a></li>
                                                <li><a class="tooltip-top" target="_blank"
                                                        href="https://www.facebook.com/dkpkp.jakarta" rel="noopener"
                                                        aria-label="facebook" data-tooltip="Facebook"><i
                                                            class="fa fa-facebook"></i></a>
                                                </li>
                                                <li><a class="tooltip-top" target="_blank"
                                                        href="https://twitter.com/dkpkpjakarta" rel="noopener"
                                                        aria-label="twitter" data-tooltip="Twitter"><i
                                                            class="fa fa-twitter"></i></a></li>
                                                <li><a class="tooltip-top" target="_blank"
                                                        href="https://www.youtube.com/channel/UCw1UZPNZkm7YXqIUsHi-szg"
                                                        rel="noopener" aria-label="youtube" data-tooltip="Youtube"><i
                                                            class="fa fa-youtube"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-footer-text copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-md-flex justify-content-center">
                                    <span class="cpy-text">Copyright © 2023 <a href="/"
                                            class="ttm-textcolor-skincolor font-weight-500">Dinas KPKP </a> All rights
                                        reserved.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!--footer end-->

            <!--back-to-top start-->
            <a id="totop" href="#top">
                <i class="fa fa-angle-up"></i>
            </a>
            <!--back-to-top end-->

    </div><!-- page end -->


    <!-- Javascript -->
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.3.2.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.js') }}"></script>
    <script src="{{ asset('js/jquery-waypoints.js') }}"></script>
    <script src="{{ asset('js/jquery-validate.js') }}"></script>
    <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/numinate.min.js') }}"></script>
    <script src="{{ asset('js/imagesloaded.min.js') }}"></script>
    <script src="{{ asset('js/jquery-isotope.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- Javascript end-->

</body>

</html>

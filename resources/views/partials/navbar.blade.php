            <!-- site-header-menu -->
            <div id="site-header-menu" class="site-header-menu">
                <div class="site-header-menu-inner ttm-stickable-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <!--site-navigation -->
                                <div class="site-navigation d-flex align-items-center justify-content-between">
                                    <!-- site-branding -->
                                    <div class="site-branding ">
                                        <a class="home-link" href="/" title="Dinas KPKP" rel="home">
                                            <img id="logo-img" height="52" width="137"
                                                class="img-fluid auto_size" src="{{ asset('images/logokp.png') }}"
                                                alt="logo-img">
                                        </a>
                                    </div><!-- site-branding end -->
                                    <div class="border-box-block">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="btn-show-menu-mobile menubar menubar--squeeze">
                                                <span class="menubar-box">
                                                    <span class="menubar-inner"></span>
                                                </span>
                                            </div>
                                            <!-- menu -->
                                            <nav class="main-menu menu-mobile" id="menu">
                                                <ul class="menu">
                                                    <li
                                                        class="mega-menu-item {{ $title === 'Beranda' ? 'active' : '' }}">
                                                        <a href="/">Beranda</a>
                                                    </li>
                                                    <li
                                                        class="mega-menu-item {{ $title === 'Profil' ? 'active' : '' }}">
                                                        <a href="/profil">Profil</a>
                                                    </li>
                                                    <li class="mega-menu-item {{ $title === 'Blog' ? 'active' : '' }}">
                                                        <a href="/blogs">Berita</a>
                                                    <li class="mega-menu-item {{ $title === 'PPID' ? 'active' : '' }}">
                                                        <a href="/ppid">PPID</a>
                                                    </li>
                                                    <li class="mega-menu-item {{ $title === 'Pelayanan NKV' ? 'active' : '' }}">
                                                        <a href="/nkv">Pelayanan NKV</a>
                                                    </li>
                                                </ul>
                                            </nav><!-- menu end -->
                                            <!-- header_extra -->
                                            <div class="header_extra d-flex flex-row align-items-center ml-auto">
                                                <!-- header_social -->
                                                <div class="header_social">
                                                    <div class="social-icons">
                                                        <ul class="social-icons list-inline">
                                                            <li><a class="tooltip-top" target="_blank"
                                                                    href="https://www.instagram.com/dkpkp.jakarta/"
                                                                    rel="noopener" aria-label="Instagram"
                                                                    data-tooltip="Instagram"><i
                                                                        class="fa fa-instagram"></i></a></li>
                                                            <li><a class="tooltip-top" target="_blank"
                                                                    href="https://www.facebook.com/dkpkp.jakarta"
                                                                    rel="noopener" aria-label="facebook"
                                                                    data-tooltip="Facebook"><i
                                                                        class="fa fa-facebook"></i></a></li>
                                                            <li><a class="tooltip-top" target="_blank"
                                                                    href="https://twitter.com/dkpkpjakarta"
                                                                    rel="noopener" aria-label="twitter"
                                                                    data-tooltip="Twitter"><i
                                                                        class="fa fa-twitter"></i></a></li>
                                                            <li><a class="tooltip-top" target="_blank"
                                                                    href="https://www.youtube.com/channel/UCw1UZPNZkm7YXqIUsHi-szg"
                                                                    rel="noopener" aria-label="youtube"
                                                                    data-tooltip="Youtube"><i
                                                                        class="fa fa-youtube"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- header_social end-->
                                            </div><!-- header_extra end -->
                                        </div>
                                    </div>
                                    <div class="header_btn">
                                        @auth
                                        @php
                                           if(Auth::user()->role=="admin"){
                                                $dashboard = route('admin.dashboard');
                                            }elseif(Auth::user()->role=="user"){
                                                $dashboard = route('user.dashboard');
                                            }elseif(Auth::user()->role=="sudin"){
                                                $dashboard = route('sudin.dashboard');
                                            }elseif(Auth::user()->role=="pengusaha"){
                                                $dashboard = route('pengusaha.dashboard');
                                            }elseif(Auth::user()->role=="dinas"){
                                                $dashboard = route('dinas.dashboard');
                                            }
                                        @endphp
                                        <a
                                            class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor"
                                            href="{{ $dashboard }}">Dashboard</a>
                                        </div>
                                        @endauth
                                        @guest
                                        <a>
                                        <img id="logo-img" height="52" width="137" class="img-fluid auto_size" src="{{ asset('images/jakarta.jpg') }}" alt="logo-img">
                                        </a>
                                        @endguest
                                        </div>
                                </div><!-- site-navigation end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- site-header-menu end-->
            </header>
            <!--header end-->

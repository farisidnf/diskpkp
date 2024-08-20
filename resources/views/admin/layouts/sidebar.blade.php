<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="/images/logo.png" alt="Logo" width="35" height="35">
            </span>
            <span class="logo-lg">
                <img src="/images/logo.png" alt="Logo" width="35" height="35">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="/images/logo.png" alt="Logo" width="35" height="35">
            </span>
            <span class="logo-lg">
                <img src="/images/logo.png" alt="Logo" width="35" height="35">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span>@lang('translation.menu')</span></li>
                <li class="nav-item {{ Nav::isRoute('admin.dashboard') }}">
                    <a class="nav-link menu-link" role="button" href="{{ url('admin/dashboard') }}">
                        <i class="las la-tachometer-alt"></i> <span>Dashboard</span>
                    </a>
                </li> <!-- end Dashboard Menu -->

                @if(Auth::user()->role == 'admin' || Auth::user()->role == 'user')
                    <li class="nav-item {{ Nav::isRoute('admin.renstra') }}">
                        <a class="nav-link menu-link" href="#sideRenstra" data-bs-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="sidebarApps">
                            <i class="lab la-delicious"></i> <span>Renstra</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sideRenstra">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="{{ url('/admin/renstra') }}" class="nav-link">Tujuan</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/admin/renstrasasaran') }}" class="nav-link">Sasaran</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/admin/program') }}" class="nav-link">Program</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif

                <li class="nav-item {{ Nav::isRoute('admin.sdi') }}">
                    <a class="nav-link menu-link" href="{{ url('admin/sdi') }}">
                        <i class="las la-flask"></i> <span>SDI</span>
                    </a>
                </li>
                <li class="nav-item {{ Nav::isRoute('admin.lppd') }}">
                    <a class="nav-link menu-link" href="{{ url('admin/lppd') }}">
                        <i class="las la-flask"></i> <span>{{ __('LPPD') }}</span>
                    </a>
                </li>
                <li class="nav-item {{ Nav::isRoute('admin.rpjmd') }}">
                    <a class="nav-link menu-link" href="{{ url('admin/rpjmd') }}">
                        <i class="las la-flask"></i> <span>{{ __('RPJDM') }}</span>
                    </a>
                </li>
                <li class="nav-item {{ Nav::isRoute('admin.sdgs') }}">
                    <a class="nav-link menu-link" href="{{ url('admin/sdgs') }}">
                        <i class="las la-flask"></i> <span>{{ __('SDGs') }}</span>
                    </a>
                </li>
                @if(Auth::user()->role == 'admin')
                    <li class="nav-item {{ Nav::isRoute('admin.master') }}">
                        <a class="nav-link menu-link" href="#sideMaster" data-bs-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="false">
                            <i class="lab la-delicious"></i> <span>Master</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sideMaster">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="{{ url('/admin/master/year') }}" class="nav-link">Tahun</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/admin/master/purpose') }}" class="nav-link">Tujuan</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/admin/master/unit') }}" class="nav-link">Bidang</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item {{ Nav::isRoute('admin.user') }}">
                        <a class="nav-link menu-link" href="{{ url('admin/user') }}">
                            <i class="las la-flask"></i> <span>{{ __('User') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Nav::isRoute('admin.blog') }}">
                        <a class="nav-link menu-link" href="{{ url('admin/blog') }}">
                            <i class="las la-flask"></i> <span>{{ __('Blog') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Nav::isRoute('admin.category') }}">
                        <a class="nav-link menu-link" href="{{ route('admin.category.index') }}">
                            <i class="las la-flask"></i> <span>{{ __('Category') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Nav::isRoute('admin.tag') }}">
                        <a class="nav-link menu-link" href="{{ route('admin.tag.index') }}">
                            <i class="las la-flask"></i> <span>{{ __('Tags') }}</span>
                        </a>
                    </li>
                @endif
                <li class="nav-item ">
                    <a class="nav-link menu-link" href="{{ url('/') }}">
                        <i class="las la-flask"></i> <span>{{ __('Beranda') }}</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>

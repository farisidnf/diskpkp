<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Dinas KPKP">

    <!-- CSRF Token -->
    <meta name="title" content="Dinas KPKP">

    @if(Auth::user()->role=="admin" || Auth::user()->role=="user")
    <title>Database Sektoral Dinas KPKP</title>
    @else
    <title>Pelayanan NKV Dinas KPKP</title>
    @endif

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/custom.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link href="{{ asset('images/favicon.png') }}" rel="icon" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>


    @stack('css')
</head>

<body id="page-top">

<div class="loading-full">Loading&#8230;</div>

<!-- <div class="content">
  <h3>stuff goes in here!</h3>
</div> -->



<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="https://dinaskpkp.com/">
            <div class="sidebar-brand-icon">
                <img src="/images/logo.png" alt="Logo" width="35" height="35">
            </div>
            <div class="sidebar-brand-text mx-3">Dinas KPKP</div>
        </a>


        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Renstra -->

        <!-- Nav Item - SDI -->
        @if(Auth::user()->role == 'sudin')
            <li class="nav-item {{ Nav::isRoute('sudin.dashboard') }}">
                <a class="nav-link" href="{{ url('sudin/dashboard') }}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item {{ Nav::isRoute('sudin.permohonannkv') }}">
                <a class="nav-link" href="{{ url('sudin/permohonannkv') }}">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Rekomendasi</span></a>
            </li>
        @elseif(Auth::user()->role == 'pengusaha')
            <li class="nav-item {{ Nav::isRoute('pengusaha.dashboard') }}">
                <a class="nav-link" href="{{ url('pengusaha/dashboard') }}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item {{ Nav::isRoute('pengusaha.permohonannkv') }}">
                <a class="nav-link" href="{{ url('pengusaha/permohonannkv') }}">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Rekomendasi</span></a>
            </li>
            <li class="nav-item {{ Nav::isRoute('pengusaha.surveilansnkv') }}">
                <a class="nav-link" href="{{ url('pengusaha/surveilansnkv') }}">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Surveilans</span></a>
            </li>
        @elseif(Auth::user()->role == 'dinas')
            <li class="nav-item {{ Nav::isRoute('dinas.dashboard') }}">
                <a class="nav-link" href="{{ url('dinas/dashboard') }}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item {{ Nav::isRoute('dinas.surveilansnkv') }}">
                <a class="nav-link" href="{{ url('dinas/surveilansnkv') }}">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Surveilans</span></a>
            </li>
            <li class="nav-item {{ Nav::isRoute('dinas.user') }}">
                <a class="nav-link" href="{{ url('dinas/user') }}">
                    <i class="fas fa-fw fa-database"></i>
                    <span>User</span></a>
            </li>
        @elseif(Auth::user()->role == 'user')
            <li class="nav-item {{ Nav::isRoute('user.dashboard') }}">
                <a class="nav-link" href="{{ url('user/dashboard') }}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>
        @elseif(Auth::user()->role == 'admin')
            <li class="nav-item {{ Nav::isRoute('admin.dashboard') }}">
                <a class="nav-link" href="{{ url('admin/dashboard') }}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>
        @endif


        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'user')
            <!-- <li class="nav-item {{ Nav::isRoute('admin.renstra') }}">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                   aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-book"></i>
                    <span>{{ __('Renstra') }}</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                     data-parent="#accordionSidebar" style="">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ url('/admin/renstra') }}">Tujuan</a>
                        <a class="collapse-item" href="{{ url('/admin/renstrasasaran') }}">Sasaran</a>
                        <a class="collapse-item" href="{{ url('/admin/program') }}">Program</a>
                    </div>
                </div>
            </li> -->
           
            <li class="nav-item {{ request()->path()=='ikumst' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('ikumst') }}">
                    <i class="fas fa-fw fa-database"></i>
                    <span>IKU</span></a>
            </li>
            

            <!-- Nav Item - SDI -->
            <li class="nav-item {{ Nav::isRoute('admin.sdi') }}">
                <a class="nav-link" href="{{ url('admin/sdi') }}">
                    <i class="fas fa-fw fa-database"></i>
                    <span>{{ __('SDI') }}</span></a>
            </li>
            <li class="nav-item {{ Nav::isRoute('admin.lppd') }}">
                <a class="nav-link" href="{{ url('admin/lppd') }}">
                    <i class="fas fa-fw fa-database"></i>
                    <span>{{ __('LPPD') }}</span></a>
            </li>
            <li class="nav-item {{ Nav::isRoute('admin.rpjmd') }}">
                <a class="nav-link" href="{{ url('admin/rpjmd') }}">
                    <i class="fas fa-fw fa-database"></i>
                    <span>{{ __('RPJMD') }}</span></a>
            </li>
            <li class="nav-item {{ Nav::isRoute('admin.sdgs') }}">
                <a class="nav-link" href="{{ url('admin/sdgs') }}">
                    <i class="fas fa-fw fa-database"></i>
                    <span>{{ __('SDGs') }}</span></a>
            </li>
            
{{--                <li class="nav-item {{ Nav::isRoute('admin.master') }}">--}}
{{--                    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseMaster"--}}
{{--                       aria-expanded="true" aria-controls="collapseMaster">--}}
{{--                        <i class="fas fa-fw fa-book"></i>--}}
{{--                        <span>{{ __('Master') }}</span>--}}
{{--                    </a>--}}
{{--                    <div id="collapseMaster" class="collapse" aria-labelledby="headingUtilities"--}}
{{--                         data-parent="#accordionSidebar" style="">--}}
{{--                        <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                            <a class="collapse-item" href="{{ url('/admin/master/year') }}">Tahun</a>--}}
{{--                            <a class="collapse-item" href="{{ url('/admin/master/unit') }}">Satuan</a>--}}
{{--                            <a class="collapse-item" href="{{ url('/admin/master/field') }}">Bidang</a>--}}
{{--                            <a class="collapse-item" href="{{ url('/admin/master/purpose') }}">Tujuan</a>--}}
{{--                            <a class="collapse-item" href="{{ url('/admin/master/master-program') }}">Program</a>--}}
{{--                            <a class="collapse-item" href="{{ url('/admin/master/master-indikator-program') }}">Indikator--}}
{{--                                Program</a>--}}
{{--                            <a class="collapse-item" href="{{ url('/admin/master/target') }}">Sasaran</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </li>--}}
            

        @endif


        @if(Auth::user()->role == 'admin')
            <li class="nav-item {{ request()->path()=='admin/category' || request()->path()=='admin/tag' || request()->path()=='admin/bidang' || request()->path()=='admin/satuan' ? 'active' : '' }}">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseMaster"
                   aria-expanded="true" aria-controls="collapseMaster">
                    <i class="fas fa-fw fa-book"></i>
                    <span>{{ __('Master') }}</span>
                </a>
                <div id="collapseMaster" class="collapse" aria-labelledby="headingMaster"
                     data-parent="#accordionSidebar" style="">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="{{ request()->path()=='admin/bidang' ? 'active' : '' }} collapse-item" href="{{ route('admin.bidang.index') }}">Bidang</a>
                        <a class="{{ request()->path()=='admin/satuan' ? 'active' : '' }} collapse-item" href="{{ route('admin.satuan.index') }}">Satuan</a>
                        <a class="{{ request()->path()=='admin/tag' ? 'active' : '' }} collapse-item" href="{{ route('admin.tag.index') }}">Tag</a>
                        <a class="{{ request()->path()=='admin/category' ? 'active' : '' }} collapse-item" href="{{ route('admin.category.index') }}">Kategori</a>
                    </div>
                </div>
            </li>

            <li class="nav-item {{ request()->path()=='admin/ppidnavbar' || request()->path()=='admin/ppidkategori' || request()->path()=='admin/ppidinformasi' ? 'active' : '' }}">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePpid"
                   aria-expanded="true" aria-controls="collapsePpid">
                    <i class="fas fa-fw fa-book"></i>
                    <span>{{ __('PPID') }}</span>
                </a>
                <div id="collapsePpid" class="collapse" aria-labelledby="headingPpid"
                     data-parent="#accordionSidebar" style="">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="{{ request()->path()=='admin/ppidnavbar' ? 'active' : '' }} collapse-item" href="{{ route('admin.ppidnavbar.index') }}">Navbar</a>
                        <a class="{{ request()->path()=='admin/ppidkategori' ? 'active' : '' }} collapse-item" href="{{ route('admin.ppidkategori.index') }}">Kategori</a>
                        <a class="{{ request()->path()=='admin/ppidinformasi' ? 'active' : '' }} collapse-item" href="{{ route('admin.ppidinformasi.index') }}">Informasi</a>
                    </div>
                </div>
            </li>

            <li class="nav-item {{ request()->path()=='admin/user' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/user') }}">
                    <i class="fas fa-fw fa-database"></i>
                    <span>User</span></a>
            </li>


            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->path()=='admin/blog' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/admin/blog') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ __('Blog') }}</span></a>
            </li>

            <!-- Nav Item - Kategori -->
            <!-- <li class="nav-item {{ Nav::isRoute('admin.category') }}">
                <a class="nav-link" href="{{ route('admin.category.index') }}">
                    <i class="fas fa-fw fa-bookmark"></i>
                    <span>{{ __('Kategori') }}</span></a>
            </li> -->

            <!-- Nav Item - Tag -->
            <!-- <li class="nav-item {{ Nav::isRoute('admin.tag') }}">
                <a class="nav-link" href="{{ route('admin.tag.index') }}">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>{{ __('Tag') }}</span></a>
            </li> -->

           

            <!-- Nav Item - Bidang -->
            <!-- <li class="nav-item {{ request()->path()=='admin/bidang' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.bidang.index') }}">
                <i class="fas fa-fw fa-tags"></i>
                <span>{{ __('Bidang') }}</span></a>
            </li> -->
        @endif
        <!-- Nav Item - Tag -->
        <li class="nav-item {{ Nav::isRoute('/') }}">
            <a class="nav-link" href="/">
                <i class="fas fa-fw fa-home"></i>
                <span>{{ __('Beranda') }}</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group-append">
                        @if(Auth::user()->role=="pengusaha" || Auth::user()->role=="sudin" || Auth::user()->role=="dinas")
                        <img src="/images/pelayanannkv.png" alt="Logo">
                        @else
                        <img src="/images/datasek.png" alt="Logo">
                        @endif
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- <div class="topbar-divider d-none d-sm-block"></div> -->
                        @if(Auth::user()->role=="pengusaha" || Auth::user()->role=="sudin" || Auth::user()->role=="dinas")
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                @if(count(cekNotif())>0)
                                <span class="badge badge-danger badge-counter">{{count(cekNotif())}}</span>
                                @endif
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notifikasi
                                </h6>
                                <div style="max-height: 30vw;overflow-y: scroll;">
                                @foreach(cekNotif() as $keyNotif)
                                <a class="dropdown-item d-flex align-items-center" href="{{url('notifikasi/ubahstatus')}}/{{$keyNotif->id}}?link={{$keyNotif->link}}">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">{{date('d M Y H:i:s', strtotime($keyNotif->created_at))}}</div>
                                        <span class="font-weight-bold">{{$keyNotif->judul}}</span>
                                    </div>
                                </a>
                                @endforeach
                                </div>
                                <a class="dropdown-item text-center small text-gray-500" href="{{route('notifikasi')}}">Lihat Semua Notifikasi</a>
                            </div>
                        </li>
                        @endif
                        <div class="topbar-divider d-none d-sm-block"></div>
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                        class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                            <figure class="img-profile rounded-circle avatar font-weight-bold"
                                    data-initial="{{ Auth::user()->name[0] }}"></figure>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                             <a class="dropdown-item" href="{{ route('profile') }}">
                                 <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                 {{ __('Profil') }}
                             </a>
                             <div class="dropdown-divider"></div>
                             @if(Auth::user()->role=="pengusaha" || Auth::user()->role=="sudin" || Auth::user()->role=="dinas")
                             @endif
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Keluar') }}
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @stack('notif')
                @yield('main-content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Dinas KPKP <?= date('Y') ?></span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Pemberitahuan') }}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin keluar?</div>
            <div class="modal-footer">
                <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Batal') }}</button>
                {{-- <a class="btn btn-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Keluar') }}</a> --}}

                <a class="btn btn-danger" href="{{ route('logout') }}"
                >{{ __('Keluar') }}</a>
                {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form> --}}
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
@stack('js')
</body>

</html>

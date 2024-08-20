@extends('admin.layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

    </div>

    <div>
        <p><b>Selamat Datang,</b><br>di Website Database Sektoral Resmi Dinas Ketahanan Pangan, Kelautan dan Pertanian
            Provinsi DKI Jakarta.</p>
    </div>

    <!-- Content Row -->
    <div class="row" {!! Auth::user()->role == 'user' ? 'style="display:none;"' : "" !!}">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4" {!! Auth::user()->role == 'user' ? 'style="display:none;"' : "" !!}">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Tujuan Belum Terisi
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $renstra }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="col-xl-4 col-md-6 mb-4" {!! Auth::user()->role == 'user' ? 'style="display:none;"' : "" !!}">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Sasaran Belum Terisi
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $renstrasasaran }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4" {!! Auth::user()->role == 'user' ? 'style="display:none;"' : "" !!}">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total Program Belum Terisi
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $program }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
    </div>


    <br/>
    <br/>
    <br/>
    <div class="col-md-12 mb-4" {!! Auth::user()->role == 'user' ? 'style="display:none;"' : "" !!}">

    Filter :
    <select name="data_triwulan" class=" col-md-3" id="data_triwulan">
        <option value="">Pilih Data Triwulan</option>
        <option
            <?php echo !empty($_GET['filter']) ? ($_GET['filter'] == 'Triwulan I' ? "selected" : "") : ""; ?> value="Triwulan I">
            Triwulan I
        </option>
        <option
            <?php echo !empty($_GET['filter']) ? ($_GET['filter'] == 'Triwulan II' ? "selected" : "") : ""; ?> value="Triwulan II">
            Triwulan II
        </option>
        <option
            <?php echo !empty($_GET['filter']) ? ($_GET['filter'] == 'Triwulan III' ? "selected" : "") : ""; ?> value="Triwulan III">
            Triwulan III
        </option>
        <option
            <?php echo !empty($_GET['filter']) ? ($_GET['filter'] == 'Triwulan IV' ? "selected" : "") : ""; ?> value="Triwulan IV">
            Triwulan IV
        </option>
        <option
            <?php echo !empty($_GET['filter']) ? ($_GET['filter'] == 'Tahunan">' ? "selected" : "") : ""; ?> value="Tahunan">
            Tahunan
        </option>
    </select>


    <select name="data_bidang" id="data_bidang">
        <option value="">Pilih Bidang</option>
        @foreach($fields as $field)
            <option <?php echo !empty($_GET['bidang']) ? ($_GET['bidang'] == $field->name ? "selected" : "") : ""; ?> value="{{ $field->name }}">{{ $field->name }}</option>
        @endforeach
    </select>

    </div>


    <hr>

    <h3>Tujuan</h3>
    <table class="table">
        <tr class="thead-dark">
            <th>No</th>
            <th>Data Tujuan Terbaru</th>
            <th>Triwulan</th>
            <th>Capaian</th>
        </tr>
        <?php
        $b = 1;
        ?>
        @foreach ($renstraData as $key => $value)
            <tr>
                <th>{{ $b++ }}</th>
                <th>Tujuan : {{ $value->indikator_tujuan }}</th>
                <th>{{ $value->data_triwulan }}</th>
                <th>{{ number_format($value->capaian,2) }}%</th>
            </tr>
        @endforeach
    </table>
    <hr/>

    <h3>Sasaran</h3>
    <table class="table">
        <tr class="thead-dark">
            <th>No</th>
            <th>Data Sasaran Terbaru</th>
            <th>Triwulan</th>
            <th>Capaian</th>
        </tr>
        <?php
        $b = 1;
        ?>
        @foreach ($renstrasasaranData as $key => $value)
            <tr>
                <th>{{ $b++ }}</th>
                <th>Sasaran : {{ $value->indikator_sasaran }}</th>
                <th>{{ $value->data_triwulan }}</th>
                <th>{{ number_format($value->capaian,2) }}%</th>
            </tr>
        @endforeach
    </table>
    <hr/>
    <h3>Program</h3>
    <table class="table">
        <tr class="thead-dark">
            <th>No</th>
            <th>Data Program Terbaru</th>
            <th>Triwulan</th>
            <th>Capaian</th>
        </tr>


        <?php
        $b = 1;
        ?>
        @foreach ($programData as $key => $value)
            <tr>
                <th>{{ $b++ }}</th>
                <th>Indikator : {{ $value->indikator }}</th>
                <th>{{ $value->data_triwulan }}</th>
                <th>{{ number_format($value->capaian,2) }}%</th>
            </tr>
        @endforeach
    </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script>

        $("#data_triwulan").change(function () {

            var data = $(this).val();

            // if(data == "") {

            // } else {
            window.location.href = "{{ url('/admin/dashboard') }}?filter=" + data + "&bidang=" + $("#data_bidang").val();
            // }
            return false;
        });


        $("#data_bidang").change(function () {

            var data = $(this).val();

            // if(data == "") {

            // } else {
            window.location.href = "{{ url('/admin/dashboard') }}?filter=" + $("#data_triwulan").val() + "&bidang=" + $("#data_bidang").val();
            ;
            // }
            return false;
        });
    </script>
@endsection

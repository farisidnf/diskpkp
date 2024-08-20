<?php

namespace App\Http\Controllers\Admin;

use App\Models\Field;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Renstra;
use App\Models\Renstrasasaran;
use App\Models\Sdi;
use Illuminate\Support\Facades\File;
use Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        // - Sasaran Belum Terisi
        // - Program Belum Terisi
        // - SDI Belum Terisi

        $title = "Dashboard";


        if (Auth::user()->role == "user") {
            $renstra = Renstra::where(['tampilkan' => 'Y'])->whereNull('capaian')->orWhere('capaian', 0)
                ->where(function ($q) {
                    $q->where('target', '!=', 'N/A')->orWhere('realisasi', '!=', 'N/A');
                })
                ->count();
            $renstrasasaran = Renstrasasaran::where(['tampilkan' => 'Y'])->whereNull('capaian')
                ->where(function ($q) {
                    $q->where('target', '!=', 'N/A')->orWhere('realisasi', '!=', 'N/A');
                })
                ->orWhere('capaian', 0)->count();
            $program = Program::where(['tampilkan' => 'Y'])->whereNull('capaian')->orWhere('capaian', 0)
                ->where(function ($q) {
                    $q->where('target', '!=', 'N/A')->orWhere('realisasi', '!=', 'N/A');
                })
                ->count();
            $sdi = Sdi::where(['tampilkan' => 'Y', 'status' => 'Menunggu Periksa'])->count();
        } else {
            $renstra = Renstra::where(['tampilkan' => 'Y'])->whereNull('capaian')->orWhere('capaian', 0)
                ->where(function ($q) {
                    $q->where('target', '!=', 'N/A')->orWhere('realisasi', '!=', 'N/A');
                })
                ->count();
            $renstrasasaran = Renstrasasaran::where(['tampilkan' => 'Y'])->whereNull('capaian')->orWhere('capaian', 0)
                ->where(function ($q) {
                    $q->where('target', '!=', 'N/A')->orWhere('realisasi', '!=', 'N/A');
                })
                ->count();
            $program = Program::where(['tampilkan' => 'Y'])->whereNull('capaian')->orWhere('capaian', 0)
                ->where(function ($q) {
                    $q->where('target', '!=', 'N/A')->orWhere('realisasi', '!=', 'N/A');
                })
                ->count();
            $sdi = Sdi::where(['tampilkan' => 'Y', 'status' => 'Menunggu Periksa'])
                ->count();
        }


        if (!empty($request->filter) && empty($request->bidang)) {
            $renstrasasaranData = Renstrasasaran::where('data_triwulan', $request->filter)->limit(5)->orderBy('id', 'desc')->get();
            $renstraData = Renstra::where('data_triwulan', $request->filter)->limit(5)->orderBy('id', 'desc')->get();
            $programData = Program::where('data_triwulan', $request->filter)->limit(5)->orderBy('id', 'desc')->get();
        } elseif (!empty($request->filter) && !empty($request->bidang)) {
            $renstrasasaranData = Renstrasasaran::where('data_triwulan', $request->filter)->where('bidang', $request->bidang)->limit(5)->orderBy('id', 'desc')->get();
            $renstraData = Renstra::where('data_triwulan', $request->filter)->where('bidang', $request->bidang)->limit(5)->orderBy('id', 'desc')->get();
            $programData = Program::where('data_triwulan', $request->filter)->where('bidang', $request->bidang)->limit(5)->orderBy('id', 'desc')->get();

        } elseif (empty($request->filter) && !empty($request->bidang)) {
            $renstrasasaranData = Renstrasasaran::where('bidang', $request->bidang)->limit(5)->orderBy('id', 'desc')->get();
            $renstraData = Renstra::where('bidang', $request->bidang)->limit(5)->orderBy('id', 'desc')->get();
            $programData = Program::where('bidang', $request->bidang)->limit(5)->orderBy('id', 'desc')->get();
        } else {

            $renstrasasaranData = Renstrasasaran::limit(5)->orderBy('id', 'desc')->get();
            $renstraData = Renstra::limit(5)->orderBy('id', 'desc')->get();
            $programData = Program::limit(5)->orderBy('id', 'desc')->get();

        }

        $fields = Field::query()->get();

        return view('admin.dashboard', compact('sdi', 'program', 'renstra', 'renstrasasaran', 'renstraData', 'renstrasasaranData', 'programData', 'title','fields'  ));
    }
}

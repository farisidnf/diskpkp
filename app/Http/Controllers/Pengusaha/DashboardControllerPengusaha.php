<?php

namespace App\Http\Controllers\Pengusaha;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Auth;

class DashboardControllerPengusaha extends Controller
{
    public function index(Request $request)
    {
        // - Sasaran Belum Terisi
        // - Program Belum Terisi
        // - SDI Belum Terisi

        $title = "Dashboard";

        return view('pengusaha.dashboard', compact('title'));
    }
}

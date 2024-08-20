<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data; // Mengimpor model Data

class DataController extends Controller
{
    public function index()
    {
        $dataControllers = Data::all(); // Menggunakan nama variabel yang sesuai
        return view('data', compact('DataControllers'));
    }
}

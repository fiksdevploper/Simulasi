<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $inventaris = Inventaris::all();
        return view('index.home', compact('inventaris'));
    }
}

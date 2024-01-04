<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Company; // import model compay 
use App\Models\Slide; // import model compay 
use App\Models\BaseClass; // import model compay 

use App\Http\Controllers\Homecontroller; // <-- Make sure this line is correct
use Illuminate\Support\Facades\DB;

class DashBoardController extends Controller
{
    public function __construct()
    {
        $this->middleware('level');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back-end.dashboard.index');
        //
    }
}

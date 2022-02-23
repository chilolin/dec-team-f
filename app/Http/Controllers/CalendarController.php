<?php

namespace App\Http\Controllers;

use App\Models\Matter;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index() {
        return Matter::all();
    }
}

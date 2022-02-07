<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MatterController extends Controller
{
    public function create() {
        $employees = User::all();

        return view('matters.create', ['employees' => $employees]);
    }

    public function store(Request $request) {
        ddd($request->all());

        return view('matters.create');
    }
}

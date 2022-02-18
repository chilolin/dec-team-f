<?php

namespace App\Http\Controllers;

use App\Consts\SkillType;
use App\Models\User;
use App\Models\Matter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * 社員詳細画面を表示。
     */

    public function show($id)
    {
        if (User::find($id) == null) {
            return redirect()->route('employees.index');
        }

        return view('employees.show', [ 'uid' => $id, 'user' => User::find($id)]);
    }

    /**
     * 社員一覧を表示。
     */
    public function search(Request $request)
    {
        $search = array();
        $search["language"] = $request ->language;
        $search["design_pattern"] = $request ->design_pattern;
        $search["position"] =  $request ->position;
        $search["process"] =  $request ->process;
        $search["proceeding"] =  $request ->proceeding;
        $search["framework"] =  $request ->framework;
        $search["infrastructure"] =  $request ->infrastructure;
        $search["database"] =  $request ->database;
        $search["engineer_type"] =  $request ->engineer_type;



        $users = User::all();
        $matters = Matter::all();
        $skills = array();
        foreach($matters as $matter){
            array_push($skills,$matter -> skills);
        }


        return view('employees.index', ['users' => $users, 'matters' => $matters,'skills' => $skills, 'search' => $search]);
    }
}

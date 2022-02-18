<?php

namespace App\Http\Controllers;

use App\Consts\SkillType;
use App\Models\User;
use App\Models\Matter;
use App\Models\Skill;
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
        if ($request ->language != NULL){
            $search["language"] = $request ->language;
        }
        if ($request ->design_pattern != NULL){
            $search["design_pattern"] = $request ->design_pattern;
        }
        if ($request ->position != NULL){

            $search["position"] =  $request ->position;
        }
        if ($request ->process != NULL){

            $search["process"] =  $request ->process;
        }
        if ($request ->proceeding != NULL){
            
            $search["proceeding"] =  $request ->proceeding;
        }        
        if ($request ->framework != NULL){
            
            $search["framework"] =  $request ->framework;
        }
        if ($request ->infrastructure != NULL){
            
            $search["infrastructure"] =  $request ->infrastructure;
        }
        if ($request ->database != NULL){

            $search["database"] =  $request ->database;
        }
        if ($request ->engineer_type != NULL){

            $search["engineer_type"] =  $request ->engineer_type;
        }

        $matter_hit = array(Skill::find(1) -> include_skill);
        foreach($search as $output){
            $corresponding_skill = Skill::where('name', $output)->get();
            foreach($corresponding_skill as $corr){
                $corr -> include_skill;
            }
            array_push($matter_hit, $corresponding_skill);
        }




        $users = User::all();
        $matters = Matter::all();
        $skills = array();
        foreach($matters as $matter){
            array_push($skills,$matter -> skills);
        }


        return view('employees.index', 
                                        ['users' => $users,
                                        'matters' => $matters,
                                        'skills' => $skills, 
                                        'search' => $search,
                                        'matter_hit' => $matter_hit
                                    ]);
    }
}

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
        //選択したスキルセットをNULLじゃなければ配列に入れる
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


        
        
        $matter_hit_each = array();
        $matter_hits = array();
        foreach($search as $output){
            //文字列で取ってきているのでスキルidを取得。
            //オブジェクトで返ってきているため、foreachで探すことに注意。
            $corresponding_skill = Skill::where('name', $output)->get();
            //各スキルに対してそれを含む案件が複数ある場合がある
            foreach($corresponding_skill as $corr){
                //選択したスキルを持ってる案件をとりあえず取ってくる
                $corr -> include_skill;
            }
            //foreachですべて一つのスキルを持つ案件に変換した
            array_push($matter_hit_each, $corresponding_skill);
            //ヒットした案件数をカウント。共起率の分母をそれぞれ取得。
            //案件数で0の可能性があるので注意
            array_push($matter_hits, count($corresponding_skill));
        }
        


        // //とりあえず取ってきた入れ子の可能性のある配列を漸化式的にすべてのスキルを含む案件
        // foreach




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
                                        'matter_hit_each' => $matter_hit_each,
                                        'matter_hits' => $matter_hits
                                    ]);
    }
}

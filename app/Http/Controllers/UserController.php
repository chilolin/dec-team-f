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
    public function index()
    {
        $users = User::all();
        return view('employees.index', ['users' => $users]);
    }

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
        if ($request->session()->has('search_criteria')) {
            $request->merge($request->session()->pull('search_criteria'));
        }
        // ddd($request->all());
        //共起行列
        // ----------------------------------------------------------------------------------------------------------------------------------
        //選択したスキルセットをNULLじゃなければ配列に入れる
        //search(skill_type => skill)
        //まだmultipleの対応ができていない
        $search = array();
        if ($request ->language != NULL){
            $search["language"] = $request ->language;
        }
        if ($request ->design_pattern != NULL){
            $search["design_pattern"] = $request ->design_pattern;
        }
        if ($request ->position != NULL) {
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
        if ($request ->database != NULL){

            $search["database"] =  $request ->database;
        }
        if ($request ->infrastructure != NULL){

            $search["infrastructure"] =  $request ->infrastructure;
        }
        if ($request ->engineer_type != NULL){

            $search["engineer_type"] =  $request ->engineer_type;
        }


        //co_occur_matrix_skill = スキルを列にとった行列
        //スキルが被った場合、MAXを取るために必要
        $co_occur_matrix_skill = array();

        //いかにもこれが共起行列
        //ただし、正方行列とは限らない。選択されたスキルを含む案件にあるスキル数が異なるから
        $co_occur_matrix = array();

        $matter_hit_each = array();
        $matter_hits = array();

        foreach($search as $output){
            //文字列で取ってきているのでスキル（オブジェクト）を取得。
            //オブジェクトの配列で返ってきているため、foreachで探すことに注意。
            //corresponding_skill -> obejct(skill)
            $corresponding_skill = Skill::where('name', $output)->get();

            foreach($corresponding_skill as $corr){
                //選択したスキルを持ってる案件を全部とりあえず取ってくる
                $matter_y = $corr ->include_skill;

                //実験用
                //スキルXを含む案件(複数の可能性)を取得
                //corresponding_skill -> obejct(matter1,matter2...)
                //ヒットした案件数をカウント。共起率の分母を取得。
                //案件数で0の可能性があるので注意
                $matter_hits_per_skill = count($matter_y);
                array_push($matter_hits, $matter_hits_per_skill);

                //co_occur_matrix_skillの共起行列の一行になる
                $co_occur_skills = array();
                //co_occur_matrixの共起率の分子の部分
                $co_occur_counts = array();

                foreach($matter_y as $matter_z){
                    //とってきた案件それぞれに何のスキルが含まれているか
                    $mat = $matter_z ->skills;
                    // $check = $mat;

                    if ($mat != NULL){
                        //co_occur_skillsに全案件中に含むスキルを保持　＝　共起行列の一行になる
                        //最初に1個数えたco_occur_countsを用意。keyの場所が一緒になる。
                        //被った場合、keyの場所で+1
                        //co_occur_skills -> array(object(skill), object(skill), ...)
                        //$co_occur_counts -> array(int, int, ...)

                        foreach($mat as $skill_in_mat){
                            //only('id')でコレクションの中の対応するカラムの値を配列で持ってくる
                            $skill_in_mat = $skill_in_mat ->only('id');
                            $skill_in_mat = $skill_in_mat['id'];

                            if (! in_array($skill_in_mat, $co_occur_skills,true)){
                                array_push($co_occur_skills, $skill_in_mat);
                                array_push($co_occur_counts,1);
                            } else {
                                $replacements = array(array_search($skill_in_mat,$co_occur_skills) => $co_occur_counts[array_search($skill_in_mat,$co_occur_skills)] + 1);
                                $changes = array_replace($co_occur_counts,$replacements);
                                // $check = $changes;
                                $co_occur_counts = $changes;
                            }
                        }
                    }
                }
            }

            //スキルXを含む案件が１つ以上ある場合
            if (count($matter_y) != 0){
                //共起率計算
                //count($matter_y) ＝　共起率の分母部分
                //変換できないので新しく共起”率”用の配列を用意
                $co_occur_possible = array();
                foreach ($co_occur_counts as $cos){
                    array_push($co_occur_possible, $cos / count($matter_y));
                }

                //共起行列の列として追加
                array_push($co_occur_matrix_skill, $co_occur_skills);
                array_push($co_occur_matrix, $co_occur_possible);
            }

            // //foreachですべて一つのスキルを持つ案件に変換した
            array_push($matter_hit_each, $corresponding_skill);
        }

        //共起行列完成
        // ----------------------------------------------------------------------------------------------------------------------------------

        //スキル全てを持つユーザーを持ってくる ->論理積で構わない
        //なぜなら、NMFであとで考慮するから

        $users = array();
        foreach($search as $output){
            $corresponding_skill = Skill::where('name', $output)->get();

            foreach($corresponding_skill as $corr_skill){
                //あるスキルを持つ全てのユーザー取得
                $corresponding_users = $corr_skill ->users;
                array_push($users, $corresponding_users);
            }
        }

        //各スキルを含むユーザーの集合積をとる
        $user_set_product = array();

        foreach($users as $user){
            foreach($user as $u){
                //idだけとってきて集合積をとる
                $u = $u ->only('id');
                $u = $u['id'];

                if(! in_array($u, $user_set_product)){
                    array_push($user_set_product,$u);
                }
            }
        }

        //一回usersを空に
        $users=array();

        foreach($user_set_product as $set){
            array_push($users, User::find($set));
        }

        return view(
            'employees.index',
            [
                'users' => $users,
                'search' => $search,
                'matter_hit_each' => $matter_hit_each,
                'matter_hits' => $matter_hits,
                'co_occur_matrix_skill' => $co_occur_matrix_skill,
                'co_occur_matrix' => $co_occur_matrix,
                // 'check' => $request->all(),
            ]
        );
    }

    public function searchByBox(Request $request) {
        if ($request->skills == '') {
            return redirect()->route('employees.index')->withInput();
        }

        $skill_ids = explode(",", $request->skills);
        $merge_skills = collect($skill_ids)
                        ->reduce(function($merge_skills, $skill_id) {
                            $skill = Skill::find($skill_id);
                            $merge_skills[$skill->skill_type][] = $skill->id;
                            return $merge_skills;
                        }, []);
        $request->session()->put('search_criteria', $merge_skills);

        return redirect()->route('employees.index')->withInput();
    }
}

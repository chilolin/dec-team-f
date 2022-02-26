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
    // public function index()
    // {
    //     $users = User::all();

    //     //user_pointに点数0を入れる
    //     $user_point = array();
    //     foreach($users as $user){
    //         $user_id = $user ->only('id');
    //         $user_id = $user_id['id'];
    //         $user_point[$user_id] = 0;
    //     }

    //     return view('employees.index', ['user_point' => $user_point]);
    // }

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
            $search_criteria = $request->session()->pull('search_criteria');
            $request->merge($search_criteria);
            $request->session()->now(
                'old_skills',
                collect($search_criteria)
                ->reduce(function($old_skills, $skill_names) {
                    foreach ($skill_names as $skill_name) {
                        $skill = Skill::firstWhere('name', $skill_name);
                        if ($skill == null) continue;

                        $old_skills[] = ['value' => $skill->id, 'text' => $skill->name, 'skillType' => $skill->skill_type];
                    }
                    return $old_skills;
                }, [])
            );
        }
        //共起行列
        // ----------------------------------------------------------------------------------------------------------------------------------
        // ==================================================================================================================================
        //スキルセット取得


        //選択したスキルセットをNULLじゃなければ配列に入れる
        //search(skill_type => skill)


        //後でユーザー取得でも使うのでコピー

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




        // ==================================================================================================================================
        //ユーザー取得


        //スキル全てを持つユーザーを持ってくる ->論理積で構わない
        //なぜなら、NMFであとで考慮するから


        //スキルが入力されていないなら全てのユーザーを取ってくる
        if (empty($search)){
            $users = User::with(['skills' => function($query) {
                 $query->orderBy('level', 'desc');
            }])->get();
            

            //ポイントは計算できないので'--'を入れておく
            $points = array();
            for($i=0;$i<count($users);$i++){
                array_push($points,'--');
            }

            return view('employees.index',
                                        ['users' => $users,
                                        'points' => $points,
                                        'search' => $search,
                                        'check' => NULL,
                                        'big_skill4' => NULL
                                    ]);
        }


        //スキルの集合積
        else{
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


            //１つ前までの集合積としてuser_copyを定義
            //スキルAとスキルB両方含むユーザーidを保存する
            $user_set_product = array();


            foreach($users as $user){
                //foreachを繰り返す過程で
                $user_copy = array();

                foreach($user as $u){
                    //idだけとってきて配列user_copyに入れる
                    $u = $u ->only('id');
                    $u = $u['id'];
                    array_push($user_copy,$u);
                }

                //何も入っていない、つまりそのスキルを持っているユーザーがいなければ
                //ユーザーには何も入れず、ブレードに返す
                if( empty ($user_copy)){
                    $users = array();
                    //ポイントは計算できないので'--'を入れておく
                    $points = array();

                    return view('employees.index',
                    ['users' => $users,
                    'points' => $points,
                    'search' => $search,
                    'check' => NULL,
                    'big_skill4' => NULL
                ]);


                }

                else{
                    //始めのスキルを持つ全てユーザーを入れるときは
                    if ( empty($user_set_product)){
                        //user_set_productに格納
                        foreach($user_copy as $copy){
                            array_push($user_set_product,$copy);
                        }

                    }else{
                        //その前の繰り返しまでに出たuser_set_productの要素が
                        //取得したユーザーidにあれば残す

                        //残すための配列を作っておく
                        $set_product_copy = array();

                        foreach($user_set_product as $set){
                            if( in_array($set,$user_copy)){
                                array_push($set_product_copy,$set);
                            }
                        }

                        //$set_product_copyが空なら対称となるユーザーはいない
                        //いたら&user_set_productに戻す

                        if( empty($set_product_copy) ){
                            $users = array();
                            //ポイントは計算できないので'--'を入れておく
                            $points = array();

                            return view('employees.index',
                            ['users' => $users,
                            'points' => $points,
                            'search' => $search,
                            'check' => NULL,
                            'big_skill4' => NULL
                            ]);
                        }
                        else{
                            $user_set_product = $set_product_copy;
                        }





                    }

                }






            }



        }


        //一回usersを空に
        $users = array();

        //スキルidからユーザーのコレクションを取得
        foreach($user_set_product as $set){
            array_push($users, User::find($set));
        }


        // ==================================================================================================================================
        //共起行列

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
        // ==================================================================================================================================
        //点数行列作成のために、転置スキル被りなどの調整
        //スキルidをキーに取った共起行列に変換

        $score_array = array();



        //暫定的なもの
        $search_key_number = array();
        foreach($search as $ser){
            array_push($search_key_number,$ser);
        }


        //行:選択したスキル
        //key:$co_occur_matrix_skill
        //value:$co_occur_matrix
        for ($i=0; $i < count($co_occur_matrix);$i++){
            $skill_selected = Skill::where('name', $search_key_number[$i])->get();
            foreach($skill_selected as $selected){
                $row = $selected->only('id');
                $row = $row['id'];
            }
            for ($j=0;$j < count($co_occur_matrix[$i]); $j++){
                $score_array[$row][$co_occur_matrix_skill[$i][$j]] = $co_occur_matrix[$i][$j];
            }
            //この$iをスキルidに後で変更
            arsort($score_array[$row]);
        }


        $score_rows = array_keys($score_array);




        //かぶり調整
        for ($i=0;$i<count($score_rows);$i++){
            //行番号だった$iを行のキーに変換
            $i = $score_rows[$i];
            //ある1行内の、列のキーを取る
            $columns_array = array_keys($score_array[$i]);

            //あるスキルに対して共起しているスキル全部
            foreach($columns_array as $col){

                //列成分のうち一つが、行配列にあれば
                if (in_array($col,$score_rows)){

                    //その行に、転置成分（列要素のがあった行番号）がなければ
                    if(! in_array($i,$score_array[$col]) ){
                        $score_array[$col][$i] = $score_array[$i][$col];
                    }

                    //転置成分があれば、大きいものに合わせる
                    else{
                        if ($score_array[$col][$i] > $score_array[$i][$col]){
                            $score_array[$i][$col] = $score_array[$col][$i];
                        }
                        else {
                            $score_array[$col][$i] = $score_array[$i][$col];
                        }

                    }

                    //交換が終われば対称の列をソートする
                    arsort($score_array[$i]);
                    arsort($score_array[$col]);

                }

            }
        }

        // ==================================================================================================================================
        //選択されたスキルの点数を20倍に


        for($i=0; $i<count($score_rows); $i++){
            $columns_array = array_keys($score_array[$score_rows[$i]]);
            for ($j=0; $j<count($score_array[$score_rows[$i]]); $j++){
                if (in_array($columns_array[$j], $score_rows)){
                    $score_array[$score_rows[$i]][$columns_array[$j]] *= 20;
                }

            }
            arsort($score_array[$score_rows[$i]]);
        }



        // ==================================================================================================================================
        //正規化で用いるMax,Minを計算
        //$max_level, $min_levelさえわかればいいので少し雑
        //行番号は適当
        
        //$level_in_users : 2d matrix
        //row: number(0,1,2...)
        //column: array(key->skill_id, value: level)
        $level_in_users = array();

        //始めは点数計算の部分とほぼ一緒
        //同じことを2回やる部分があり、計算時間は最適ではない
        //ここでユーザーidを取得するのが面倒だった

        foreach($users as $user){
            //このユーザーが持ってるスキル全部取る
            $skill_in_user = $user -> skills;

            //持ってるスキルが0じゃなければ、
            if($skill_in_user != NULL){

                //1ユーザーの持ってる全スキルidをキー
                //1ユーザーの持ってる全スキルlevelをバリューにした配列作成
                $skill_id_level = array();

                //スキル一つ一つ見るが、中間テーブルのカラム要素
                //['is_practice', 'is_learning', 'level']も含むことに注意
                foreach($skill_in_user as $skill_collection){
                    //スキルid取得
                    $skill_id = $skill_collection ->only('id');
                    $skill_id = $skill_id['id'];

                    //skillsのpivot属性('useable'は使わない)でそのユーザーが持っている1スキルのレベルを取得
                    $skill_level = $skill_collection -> pivot -> level;

                    $skill_id_level[$skill_id] = $skill_level;
                }
                arsort($skill_id_level);
                array_push($level_in_users,$skill_id_level);
            }            
        }
        
        //各列はソートされあるので先頭要素、末尾要素でMax, Min決定
        //初期値はありえない値で


        $max_level_array = array();
        $min_level_array = array();

        foreach($level_in_users as $row){
            $length = count($row);
            $key = array_keys($row);
            array_push($max_level_array, $row[$key[0]]);
            array_push($min_level_array,$row[$key[$length -1 ]]);
        }

        $max_level = max(array_values($max_level_array));
        $min_level = min(array_values($min_level_array));


        // ==================================================================================================================================
        //四分位数を求める用の関数定義
        //中央値を求める補助関数
        //median: $array -> num
        function median($array){
            asort($array);
            $key = array_keys($array);
            $length = count($array);
            if(($length % 2) != 0){
                return $array[$key[floor($length / 2)]];
            }else{
                $evens = ($array[$key[floor($length / 2)]] + $array[$key[($length / 2) - 1]]) /2;
                return $evens;
            }
        }

        //quartile: $array -> $array(num, num, num)
        //キーはnum
        function quartile($array){
            asort($array);
            $key = array_keys($array);
            
            $q2 = median($array);
            $length = count($array);
            $former = array();
            $latter = array();
            if(($length % 2) != 0){
                for($i=0; $i< (floor($length / 2)); $i++){
                    array_push($former,$array[$key[$i]]);
                }
                $i++;
                for($i; $i< $length;$i++){
                    array_push($latter,$array[$key[$i]]);
                }
            }else{
                for($i=0; $i< (floor($length / 2)); $i++){
                    array_push($former,$array[$key[$i]]);
                }
                for($i; $i< $length;$i++){
                    array_push($latter,$array[$key[$i]]);
                }
            }
            $q1 = median($former);
            $q3 = median($latter);

            return array($q1,$q2,$q3);

        }


        

        // ==================================================================================================================================
        //各ユーザーに対して、点数計算

        $user_point = array();


        foreach($users as $user){
            //userのなかにはコレクション


            //初期値0。入力スキルがない場合は既にユーザー取得時に排除済み。
            $points = 0;

            //このユーザーが持ってるスキル全部取る
            $skill_in_user = $user -> skills;

            // $check = $skill_in_user;

            //持ってるスキルが0じゃなければ、
            if($skill_in_user != NULL){

                //1ユーザーの持ってる全スキルidをキー
                //1ユーザーの持ってる全スキルlevelをバリューにした配列作成
                $skill_id_level = array();

                //スキル一つ一つ見るが、中間テーブルのカラム要素
                //['is_practice', 'is_learning', 'level']も含むことに注意
                foreach($skill_in_user as $skill_collection){
                    //スキルid取得
                    $skill_id = $skill_collection ->only('id');
                    $skill_id = $skill_id['id'];

                    //skillsのpivot属性('useable'は使わない)でそのユーザーが持っている1スキルのレベルを取得
                    $skill_level = $skill_collection -> pivot -> level;

                    $skill_id_level[$skill_id] = $skill_level;


                }
                // ==================================================================================================================================
                //RobustScaler
                //データの中央値からの偏差（＝中央値を中心0にした場合の値）を
                //四分位範囲（＝第3四分位数－第1四分位数）で割る
    
                $skill_user_key = array_keys($skill_id_level);
    
                for($i=0; $i<count($skill_user_key); $i++){
                    $quart = quartile($skill_id_level);
                    if(( $quart[2] - $quart[0]) == 0){
                        $skill_id_level[$skill_user_key[$i]] 
                        = ($skill_id_level[$skill_user_key[$i]] - $quart[1]) / (0.5);
                    }else{
                        $skill_id_level[$skill_user_key[$i]] 
                        = ($skill_id_level[$skill_user_key[$i]] - $quart[1]) / ( $quart[2] - $quart[0]);
    
                    }
                }            

                // ==================================================================================================================================
                //ユーザーが持ってるスキルのレベルをMin-Max Normalizationで正規化
                //Min=0; Max=1;でスケーリングする
                //ユーザー一人ずつやってもダメ。学習中で低いスキルを持つものが過剰高得点に。（選択されたスキル以外で）
                //このforeachの外で$max_level, $min_levelとして定義済み


                $max_level = max($skill_id_level);
                $min_level = min($skill_id_level);

                $skill_user_key = array_keys($skill_id_level);

                for($i=0; $i<count($skill_user_key); $i++){
                    $skill_id_level[$skill_user_key[$i]] 
                    = ($skill_id_level[$skill_user_key[$i]] - $min_level) / ( $max_level - $min_level);
                }







            // ==================================================================================================================================




                //点数行列を1行ずつ確認
                foreach($score_array as $score){

                    //ユーザーが持っているスキルのidとlevelの配列から
                    //キーであるidを持ってくる
                    //↑で正規化前と別物
                    $skill_user_key = array_keys($skill_id_level);


                    //点数行列１行内の列全てのキーを取る
                    $skill_score_key = array_keys($score);


                    //上位10位、または列成分が10以下の場合は全てのスキルの計算
                    //↑編集！！！言語とフレームワークに絞ることで要素数が少ないものが低得点になる
                    for ($i=0; $i < count($score) || $i < 10; $i++){

                        //もし、そのスキルidを$skill_id_in_userが持っていれば
                        //skill_level_in_userの値と点数を乗算の上、ポイント加算
                        if(in_array($skill_score_key[$i], $skill_user_key)){

                            //言語とフレームワーク以外で点数を与えない
                            //スキルidからスキルタイプを取ってくる
                            $corresponding_skill_type = Skill::find($skill_score_key[$i])->get();
                            foreach($corresponding_skill_type as $type){
                                $skill_type = $type ->only('skill_type');
                                $skill_type = $skill_type['skill_type'];
                            }

                            if($skill_type == 'language' || $skill_type == 'framework'){

                                //点数×スキルレベル
                                //skill_id_levelのキーは本来ユーザーが持っているスキルのidだが
                                //点数行列の列要素と同じキーを持つことを既に検証している
                                $points += number_format($score[$skill_score_key[$i]] * $skill_id_level[$skill_score_key[$i]], 2);
                                // $points = log10($points);

                            }






                        }
                    }
                }

            }

            $user_id = $user ->only('id');
            $user_id = $user_id['id'];

            $user_point[$user_id] = $points;

            // $check = $points;



        }




        $check = $user_point;




        // ==================================================================================================================================
        //点数に応じてユーザーをソートする

        arsort($user_point);

        $check = $user_point;

        //ユーザーをソートする
        //一回空にしてから
        $users = array();

        //ソート済みのuser_pointのキー取得
        $user_point_id = array_keys($user_point);

        for($i=0; $i<count($user_point);$i++){
            $user = User::find($user_point_id[$i]);
            array_push($users, $user);
        }

        //点数の配列も作成
        $points = array();
        foreach($user_point as $up){
            array_push($points,$up);
        }



        // ==================================================================================================================================
        //重要スキル4つを取ってくる
        //（usersの数）×4の配列
        $big_skill4 = array();

        //選択されたスキルの数を定義
        $big_skill_count = count($search);

        //選択されたスキルが4つ以上なら
        if($big_skill_count >= 4){
            //始め4つのスキルのコレクションをbig_skill4に格納
            $search_key = array_keys($search);
            for($i=0; $i < 4 ; $i++){
                $corresponding_skill = Skill::where('name', $search[$search_key[$i]])->get();

                foreach($corresponding_skill as $corr){
                    array_push($big_skill4,$corr);
                }
            }

        } else{
            //4つ未満であれば
            //まず、選択されたスキルを全てbig_skill4に格納
            $search_key = array_keys($search);
            for($i=0; $i < $big_skill_count ; $i++){
                $corresponding_skill = Skill::where('name', $search[$search_key[$i]])->get();

                foreach($corresponding_skill as $corr){
                    array_push($big_skill4,$corr);
                }
            }


            //選択されたスキルを全てbig_skill4に格納後
            //まず、、

            //キーの同じ配列2つを作る
            //キー：string(行番号vs列番号)
            //score_arrayの（行、列）を保存
            $big_skill_sort_keys = array();

            //score_arrayの（行、列）の点数を保存
            $big_skill_sort = array();

            $score_rows = array_keys($score_array);

            for ($i=0; $i<count($score_rows);$i++){
                $score_columns = array_keys($score_array[$score_rows[$i]]);

                for($j=0;$j<count($score_columns);$j++){
                    $same_key = (string)$i . "vs" . (string) $j;
                    $big_skill_sort_keys[(string)$same_key] = array($score_rows[$i],$score_columns[$j]);
                    $big_skill_sort[(string)$same_key] = $score_array[$score_rows[$i]][$score_columns[$j]];
                }
            }

            //$big_skill_sortをソート
            arsort($big_skill_sort);
            $same_keys = array_keys($big_skill_sort);

            for($i=0;$i<count($same_keys);$i++){
                $key = $same_keys[$i];
                $skill_columns = $big_skill_sort_keys[$key][1];

                $corresponding_skill = Skill::find($skill_columns);
                $check = $corresponding_skill;

                if (! in_array($corresponding_skill,$big_skill4)){
                    array_push($big_skill4,$corresponding_skill);
                    $big_skill_count++;
                    if ($big_skill_count >= 4){
                        break;
                    }
                }

            }



            $check = $skill_id_level;
            // ==================================================================================================================================

            return view('employees.index',
                                            ['users' => $users,
                                            'points' => $points,
                                            'search' => $search,
                                            'check' => $check,
                                            'big_skill4' => $big_skill4
                                        ]);

        }
    }



    public function searchByBox(Request $request) {
        if ($request->skills == '') {
            return redirect()->route('employees.index')->withInput();
        }

        $skill_ids = explode(",", $request->skills);
        $merge_skills = collect($skill_ids)
                        ->reduce(function($merge_skills, $skill_id) {
                            $skill = Skill::find($skill_id);
                            $merge_skills[$skill->skill_type][] = $skill->name;
                            return $merge_skills;
                        }, []);
        $request->session()->put('search_criteria', $merge_skills);

        return redirect()->route('employees.index')->withInput();
    }
}

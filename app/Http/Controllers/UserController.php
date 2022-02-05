<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * 社員一覧を表示。
     */
    public function search()
    {
        $users = User::all();
        return view('employees.index', ['users' => $users]);
    }

    public $skillTypeTranslator = [
        'language' => 'プログラミング言語',
        'framework' => 'フレームワーク',
        'design_pattern' => 'デザインパターン',
        'process' => '開発工程',
        'proceeding' => '開発の進め方',
        'engineer_type' => 'エンジニアの種類',
        'position' => '役職',
        'database' => 'データベース',
        'infrastructure' => 'インフラ技術',
    ];

    /**
     * 学習スキル編集画面を表示。
     */
    public function learning_edit($skill_type)
    {
        if (array_search($skill_type, array_keys($this->skillTypeTranslator)) === false)
        {
            return redirect()->route('employees.show', ['id' => Auth::id()]);
        }

        $skillList = User::find(Auth::id())->skills->where('skill_type', $skill_type)->where('pivot.is_learning', true);
        return view('employees.edit', ['skillTypeTranslator' => $this->skillTypeTranslator, 'skillType' => $skill_type, 'skillList' => $skillList]);
    }

    /**
     * キャリアスキル編集画面を表示。
     */
    public function career_edit($skill_type)
    {
        if (array_search($skill_type, array_keys($this->skillTypeTranslator)) === false)
        {
            return redirect()->route('employees.show', ['id' => Auth::id()]);
        }

        $skillList = User::find(Auth::id())->career_skills->where('skill_type', $skill_type);
        return view('employees.edit', ['skillTypeTranslator' => $this->skillTypeTranslator, 'skillType' => $skill_type, 'skillList' => $skillList]);
    }
}

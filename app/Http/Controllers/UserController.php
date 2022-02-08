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

    public $skill_types = [
        'language',
        'framework',
        'design_pattern',
        'process',
        'proceeding',
        'engineer_type',
        'position',
        'database',
        'infrastructure',
    ];
    /**
     * 学習スキル編集画面を表示。
     */
    public function learning_edit($skill_type)
    {
        if (array_search($skill_type, $this->skill_types) === false)
        {
            return redirect()->route('employees.show', ['id' => Auth::id()]);
        }

        $skill_list = User::find(Auth::id())->skills->where('skill_type', $skill_type)->where('pivot.is_learning', true);
        return view('employees.edit', ['skill_type' => $skill_type, 'skill_list' => $skill_list]);
    }

    /**
     * キャリアスキル編集画面を表示。
     */
    public function career_edit($skill_type)
    {
        if (array_search($skill_type, $this->skill_types) === false)
        {
            return redirect()->route('employees.show', ['id' => Auth::id()]);
        }

        $skill_list = User::find(Auth::id())->career_skills->where('skill_type', $skill_type);
        return view('employees.edit', ['skill_type' => $skill_type, 'skill_list' => $skill_list]);
    }
}

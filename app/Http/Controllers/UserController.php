<?php

namespace App\Http\Controllers;

use App\Consts\SkillType;
use App\Models\User;
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
        $detail = User::find($id);
        return view('employees.show', [ 'uid' => $id, 'detail' => $detail]);
     }


    /**
     * 社員一覧を表示。
     */
    public function search()
    {
        $users = User::all();
        return view('employees.index', ['users' => $users]);
    }

    /**
     * 学習スキル編集画面を表示。
     */
    public function learning_edit($skill_type)
    {
        if (array_search($skill_type, SkillType::SKILL_TYPES) === false)
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
        if (array_search($skill_type, SkillType::SKILL_TYPES) === false)
        {
            return redirect()->route('employees.show', ['id' => Auth::id()]);
        }

        $skill_list = User::find(Auth::id())->career_skills->where('skill_type', $skill_type);
        return view('employees.edit', ['skill_type' => $skill_type, 'skill_list' => $skill_list]);
    }
}

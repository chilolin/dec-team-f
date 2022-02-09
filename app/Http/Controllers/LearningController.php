<?php

namespace App\Http\Controllers;

use App\Consts\SkillType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearningController extends Controller
{
    /**
     * 学習スキル編集画面を表示。
     */
    public function edit($skill_type)
    {
        if (array_search($skill_type, SkillType::SKILL_TYPES) === false)
        {
            return redirect()->route('employees.show', ['id' => Auth::id()]);
        }

        $skill_list = User::find(Auth::id())->skills->where('skill_type', $skill_type)->where('pivot.is_learning', true);
        return view('employees.edit', ['skill_type' => $skill_type, 'skill_list' => $skill_list]);
    }

    public function store()
    {
        return redirect();
    }
}

<?php

namespace App\Http\Controllers;

use App\Consts\SkillType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CareerController extends Controller
{
    /**
     * キャリアスキル編集画面を表示。
     */
    public function edit($skill_type)
    {
        if (array_search($skill_type, SkillType::SKILL_TYPES) === false)
        {
            return redirect()->route('employees.show', ['id' => Auth::id()]);
        }

        $skill_list = User::find(Auth::id())->career_skills->where('skill_type', $skill_type);
        return view('employees.edit', ['skill_type' => $skill_type, 'skill_list' => $skill_list]);
    }

    public function store(Request $request, TagsinputController $tagsinput, $skill_type)
    {
        $user = User::find(Auth::id());

        $user->career_skills()->where(['skill_type' => $skill_type])->detach();

        foreach($request->skills as $skill) {
            $skill_ids = $tagsinput->createSkills($skill['name'], $skill_type);

            if (count($skill_ids)) {
                foreach($skill_ids as $skill_id) {
                    $user->career_skills()->attach($skill_id, ['level' => $skill['level']]);
                }
            }
        }

        return redirect()->route('employees.show', ['id' => Auth::id()]);
    }
}

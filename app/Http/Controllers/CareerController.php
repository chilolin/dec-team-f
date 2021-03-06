<?php

namespace App\Http\Controllers;

use App\Consts\SkillType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CareerController extends Controller
{
    private $tagsinput;

    public function __construct()
    {
        $this->tagsinput = new TagsinputController();
    }

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

    public function store(Request $request, $skill_type)
    {
        $request->validate([
            'skills' => 'required|array',
            'skills.*.name' => 'required_with:skills.*.level|json',
            'skills.*.level' => 'required_with:skills.*.name|string',
        ]);

        $career_skills = User::find(Auth::id())->career_skills();

        $career_skills->detach(
            $career_skills
            ->where(['skill_type' => $skill_type])
            ->get()
            ->map(function($career_skill) {
                return $career_skill->id;
            })
            ->all()
        );

        $career_skills->attach(
            collect($request->skills)
            ->reduce(function($attach_skills, $skill) use($skill_type) {
                foreach($this->tagsinput->createSkills($skill['name'], $skill_type) as $skill_id) {
                    $attach_skills[$skill_id] = ['level' => $skill['level']];
                }
                return $attach_skills;
            }, [])
        );

        return redirect()->route('employees.show', ['id' => Auth::id()]);
    }
}

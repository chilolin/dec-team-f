<?php

namespace App\Http\Controllers;

use App\Consts\SkillType;
use App\Models\Client;
use App\Models\Matter;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class MatterController extends Controller
{
    public function create() {
        $employees = User::all();

        return view('matters.create', ['employees' => $employees]);
    }

    public function store(Request $request, TagsinputController $tagsinput) {
        $request->validate([
            'matter_name' => 'required|string|max:100',
            'client_name' => 'required|string|max:100',
            'matter_start_at' => 'required|date|before:matter_end_at',
            'matter_end_at' => 'required|date|after:matter_start_at',
            'process' => 'required|json',
            'proceeding' => 'required|json',
            'design_pattern' => 'required|json',
            'frontend_language' => 'required|json',
            'frontend_framework' => 'required|json',
            'backend_language' => 'required|json',
            'backend_framework' => 'required|json',
            'database' => 'required|json',
            'infrastructure' => 'required|json',
            'engineers' => 'required',
        ]);

        // 案件に登録するスキルを取得
        $skill_ids = [];
        foreach ($request->except(['matter_name', 'client_name', 'matter_start_at', 'matter_end_at', 'engineers']) as $skill_type => $tagsinput_skills) {
            if (!$tagsinput_skills) continue;

            $skill_type = str_contains($skill_type, 'language') ? SkillType::LANGUAGE : $skill_type;
            $skill_type = str_contains($skill_type, 'framework') ? SkillType::FRAMEWORK : $skill_type;

            array_push($skill_ids, ...$tagsinput->createSkills($tagsinput_skills, $skill_type));
        }

        // 案件を作成し登録
        $matter = Matter::create([
            'name' => $request->matter_name,
            'client_id' => Client::create(['name' => $request->client_name])->id,
            'start_at' => $request->matter_start_at,
            'end_at' => $request->matter_end_at,
        ]);
        // 案件にスキルとエンジニアを登録
        $matter->skills()->sync($skill_ids);
        $matter->users()->syncWithPivotValues(
            $request->engineers,
            [
                'start_at' => $request->matter_start_at,
                'end_at' => $request->matter_end_at,
            ]
        );

        return redirect()->route('matters.show', ['id' => $matter->id]);
    }
}

<?php

namespace App\Http\Controllers;

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

    public function store(Request $request, Skill $skill) {
        $validated = $request->validate([
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

        // JSONをデコード
        $tagsinput_values = [];
        foreach (
            $request->except(['matter_name', 'client_name', 'matter_start_at', 'matter_end_at', 'engineers'])
            as $key => $value
        ) {
            $tagsinput_values[$key] = json_decode($value);
        }
        // 案件に登録するスキルを取得
        $skill_ids = [];
        foreach ($tagsinput_values as $skill_type => $tagsinput_skills) {
            if (!$tagsinput_skills) continue;

            if (str_contains($skill_type, 'language')) {
                $skill_type = 'language';
            }
            if (str_contains($skill_type, 'framework')) {
                $skill_type = 'framework';
            }

            foreach ($tagsinput_skills as $tagsinput_skill) {
                $skill_id = $skill->createTagsinput($tagsinput_skill, $skill_type);

                // 同一スキルを登録しないようにする
                if (array_search($skill_id, $skill_ids)) continue;

                array_push($skill_ids, $skill_id);
            }
        }

        // 案件を作成し登録
        $matter = Matter::create([
            'name' => $validated['matter_name'],
            'client_id' => Client::create(['name' => $validated['client_name']])->id,
            'start_at' => $validated['matter_start_at'],
            'end_at' => $validated['matter_end_at']
        ]);
        // 案件にスキルとエンジニアを登録
        $matter->skills()->sync($skill_ids);
        $matter->users()->sync($validated['engineers']);

        return redirect()->route('matters.show', ['id' => $matter->id]);
    }
}

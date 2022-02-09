<?php

namespace App\Http\Controllers;

use App\Models\Skill;

class TagsinputController extends Controller {
    /**
    * tagsinputで入力されたスキルを登録する。
    * スキルがすでにある場合はスキルテーブルに登録されないようにした。
    * 入力されたスキルのIDを返す。
    *
    * @param string $tagsinput_skills
    * @param 'language'|'framework'|'design_pattern'|'process'|'proceeding'|'engineer_type'|'position'|'database'|'infrastructure' $skill_type
    * @return array $skill_ids
    */
    public function createSkills($tagsinput_skills, $skill_type) {
        if (!$tagsinput_skills) {
            return [];
        }

        return collect(json_decode($tagsinput_skills))
                ->map(function($tagsinput_skill) use($skill_type) {
                    $skill_name = $tagsinput_skill->value;

                    if ($tagsinput_skill->id === 'new') {
                        if (Skill::where(['name' => $skill_name, 'skill_type' => $skill_type])->exists()) {
                            return Skill::where(['name' => $skill_name, 'skill_type' => $skill_type])->get()[0]->id;
                        }
                        return Skill::create(['name' => $skill_name, 'skill_type' => $skill_type])->id;
                    }

                    return $tagsinput_skill->id;
                })
                ->all();
    }
}

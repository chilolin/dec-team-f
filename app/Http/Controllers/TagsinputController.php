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
        $skill_ids = [];
        if (!$tagsinput_skills) {
            return $skill_ids;
        }

        $tagsinput_skills = json_decode($tagsinput_skills);

        foreach ($tagsinput_skills as $tagsinput_skill) {
            $skill_id = $tagsinput_skill->id;
            $skill_name = $tagsinput_skill->value;

            if ($skill_id === 'new') {
                if (Skill::where(['name' => $skill_name, 'skill_type' => $skill_type])->exists()) {
                    $skill_id = Skill::where(['name' => $skill_name, 'skill_type' => $skill_type])->get()[0]->id;
                } else {
                    $skill_id = Skill::create(['name' => $skill_name, 'skill_type' => $skill_type])->id;
                }
            }

            // 同一スキルを登録しないようにする
            if (array_search($skill_id, $skill_ids)) continue;

            $skill_ids[count($skill_ids)] = $skill_id;
        }

        return $skill_ids;
    }
}

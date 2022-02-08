<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'skill_type',
        'version',
    ];

    /**
     * このスキルに属するユーザー
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'skill_user')
        ->as('useable')
        ->withPivot(['is_practice', 'is_learning', 'level'])
        ->withTimestamps();
    }

    /**
     * このスキルに属する今後学習したいユーザー
     */
    public function career_users()
    {
        return $this->belongsToMany(User::class, 'careers', 'skill_id', 'user_id')
        ->withTimestamps();
    }

    public function specific_skills($skillType)
    {
        return self::where('skill_type', $skillType)->get();
    }

    /**
     * tagsinputからのスキルを登録する。
     *
     * @param mixed $input_skill
     * @param 'language'|'framework'|'design_pattern'|'process'|'proceeding'|'engineer_type'|'position'|'database'|'infrastructure' $skill_type
     * @return array $skill_ids
     */
    public function createTagsinput($tagsinput_skills, $skill_type) {
        $skill_ids = [];

        foreach ($tagsinput_skills as $tagsinput_skill) {
            $skill_id = $tagsinput_skill->id;
            $skill_name = $tagsinput_skill->value;

            if ($skill_id == 'new') {
                if (self::where(['name' => $skill_name, 'skill_type' => $skill_type])->exists()) {
                    $skill_id = self::where(['name' => $skill_name, 'skill_type' => $skill_type])->get()[0]->id;
                } else {
                    $skill_id = self::create(['name' => $skill_name, 'skill_type' => $skill_type])->id;
                }
            }

            // 同一スキルを登録しないようにする
            if (array_search($skill_id, $skill_ids)) continue;

            $skill_ids[count($skill_ids)] = $skill_id;
        }

        return $skill_ids;
    }
}

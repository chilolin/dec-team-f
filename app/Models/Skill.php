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
     * @return int $skill_id
     */
    public function createTagsinput($input_skill, $skill_type) {
        $skill_id = $input_skill->id;

        if (
            $skill_id == 'new'
            && !self::where(['name' => $input_skill->value, 'skill_type' => $skill_type])->exists()
        ) {
            $skill_id = self::create(['name' => $input_skill->value, 'skill_type' => $skill_type])->id;
        }

        return $skill_id;
    }
}

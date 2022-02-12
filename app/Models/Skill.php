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
        ->withPivot('level')
        ->withTimestamps();
    }

    //DashboardControllerで使用するためstaticを追加
    public static function specific_skills($skillType)
    {
        return self::where('skill_type', $skillType)->get();
    }
}

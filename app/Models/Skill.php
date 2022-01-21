<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

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
}

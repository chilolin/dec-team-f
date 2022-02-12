<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_master' => 'boolean',
    ];

    /**
     * このユーザーが使用できるスキル
     */
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'skill_user')
        ->withPivot(['is_practice', 'is_learning', 'level'])
        ->withTimestamps();
    }


    /**
     * このユーザーが今後学習したいスキル
     */
    public function career_skills()
    {
        return $this->belongsToMany(Skill::class, 'careers', 'user_id', 'skill_id')
        ->withPivot('level')
        ->withTimestamps();
    }

    /**
     * このユーザーがアサインされた案件
     */
    public function matters()
    {
        return $this->belongsToMany(Matter::class, 'matter_user')->withTimestamps();
    }
}

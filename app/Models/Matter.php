<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matter extends Model
{
    use HasFactory;

    /**
     * この案件に属する依頼者
     */
    public function client()
    {
        return $this->hasOne(Client::class);
    }

    /**
     * この案件に属するスキル
     */
    public function skills()
    {
        return $this->belongsToMany(Skill::class)
        ->withPivot('engineer_type')
        ->withTimestamps();
    }
}

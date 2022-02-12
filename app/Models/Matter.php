<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'client_id',
        'start_at',
        'end_at',
    ];

    /**
     * この案件を依頼した依頼者
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * この案件が使用するスキル
     */
    public function skills()
    {
        return $this->belongsToMany(Skill::class)
        ->withTimestamps();
    }

    /**
     * この案件にアサインされたエンジニア
     */
    public function users()
    {
        return $this->belongsToMany(User::class)
        ->withPivot(['start_at', 'end_at'])
        ->withTimestamps();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * この依頼者が依頼した案件
     */
    public function matters()
    {
        return $this->hasMany(Matter::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HardSkill extends Model
{
    /** @use HasFactory<\Database\Factories\HardSkillFactory> */
    use HasFactory;

    protected $fillable=[
        'name'
    ];
}

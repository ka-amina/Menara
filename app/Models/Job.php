<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    protected $fillable=[
        'title',
        'description',
        'category_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function hardSkills(){
        return $this->belongsToMany(Hardskill::class,'job_hard_skills');
    }
    public function softSkills(){
        return $this->belongsToMany(SoftSkill::class,'job_soft_skills');
    }
   
}

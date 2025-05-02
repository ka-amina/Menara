<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    /** @use HasFactory<\Database\Factories\EvaluationFactory> */
    use HasFactory;

    protected $fillable=[
        'candidate_id',
        'offer_id',
        'interviewer_id',
        'profile_validated',
        'decision_justification'
    ];

    public function candidate(){
        return $this->belongsTo(Candidate::class);
    
    }
    public function interviewer(){
        return $this->belongsTo(User::class);
    
    }
    public function offer(){
        return $this->belongsTo(Offer::class);
    
    }
}

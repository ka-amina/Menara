<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'candidate_id',
        'interviewer_id',
        'scheduled_at',
        'meeting_link',
        'start_time',
        'end_time',
        'offer_id'
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function interviewer()
    {
        return $this->belongsTo(User::class, 'interviewer_id');
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}
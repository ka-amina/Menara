<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Candidate extends Model
{
    use HasFactory,Notifiable;

    protected $fillable=[
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'cv_path',
        'offer_id',
        'score',
        'status',
    ];

    public function interviews()
    {
        return $this->hasMany(Interview::class);
    }
    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}

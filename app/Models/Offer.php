<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    /** @use HasFactory<\Database\Factories\OfferFactory> */
    use HasFactory;

    protected $fillable=[
        'job_id',
        'level',
        'location',
        'location_type',
        'requirements',
        'start_date',
        'contract_type',
        'status',
        'about_offer',
        'company_id'
    ] ;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function job() {
        return $this->belongsTo(Job::class);
    }
}

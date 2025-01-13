<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    protected $table = 'job_listings';

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['title'] ?? false, function ($query, $title) {
            $query->where('title', 'like', '%' . $title . '%');
        });

        $query->when($filters['location'] ?? false, function ($query, $location) {
            $query->where('location', 'like', '%' . $location . '%');
        });

        $query->when($filters['salary_min'] ?? false, function ($query, $salaryMin) {
            $query->where('salary', '>=', $salaryMin);
        });

        $query->when($filters['salary_max'] ?? false, function ($query, $salaryMax) {
            $query->where('salary', '<=', $salaryMax);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}

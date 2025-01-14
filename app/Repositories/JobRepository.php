<?php

namespace App\Repositories;

use App\Models\Job;

class JobRepository
{
    public function filterJobs($filters)
    {
        return Job::query()
            ->filter($filters)
            ->paginate(10);
    }
}
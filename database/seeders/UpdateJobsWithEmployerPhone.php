<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;

class UpdateJobsWithEmployerPhone extends Seeder
{
    public function run()
    {
        $jobs = Job::all();

        $jobs->each(function ($job) {
            $job->update([
                'employer_phone' => fake()->phoneNumber(),
            ]);
        });
    }
}

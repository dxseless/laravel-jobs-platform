<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Database\Seeder;

class PopulateEmployersAndJobs extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $employers = Employer::with('user')->get();
        
        Job::whereNull('employer_id')->chunk(200, function ($jobs) use ($employers) {
            foreach ($jobs as $job) {
                $randomEmployer = $employers->random();
                $job->update([
                    'employer_id' => $randomEmployer->id,
                    'employer_phone' => $randomEmployer->employer_phone,
                    'user_id' => $randomEmployer->user->id,
                ]);
            }
        });
    }
}
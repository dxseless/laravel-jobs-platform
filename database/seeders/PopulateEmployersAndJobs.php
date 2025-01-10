<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PopulateEmployersAndJobs extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Employer::factory(10)->create();

        $employers = Employer::all();

        $jobs = Job::all();

        $jobs->each(function ($job) use ($employers) {
            $job->employer_id = $employers->random()->id; 
            $job->save();
        });
    }
}

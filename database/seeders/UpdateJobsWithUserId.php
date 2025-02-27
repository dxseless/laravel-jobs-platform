<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;

class UpdateJobsWithUserId extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() {
        
        $users = User::all();
        $jobs = Job::all();
        
        $jobs->each(function ($job) use ($users) {
            $job->user_id = $users->random()->id; 
            $job->save();
        });
    }
}

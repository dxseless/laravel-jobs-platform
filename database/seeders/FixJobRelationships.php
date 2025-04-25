<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FixJobRelationships extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('job_listings')->update(['employer_id' => null]);
    
        $employers = Employer::all();
        $jobs = Job::all();
        
        $jobs->each(function ($job) use ($employers) {
            $job->update([
                'employer_id' => $employers->random()->id,
                'employer_phone' => $employers->random()->employer_phone
            ]);
        });
    }
}

<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class AssignCategoriesAndTagsSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $jobs = Job::all();

        foreach ($jobs as $job) {
            if ($categories->isNotEmpty()) {
                $job->category_id = $categories->random()->id;
                $job->save();
            }

            if ($tags->isNotEmpty()) {
                $randomTags = $tags->random(rand(1, 3))->pluck('id')->toArray();
                $job->tags()->sync($randomTags);
            }
        }
    }
}

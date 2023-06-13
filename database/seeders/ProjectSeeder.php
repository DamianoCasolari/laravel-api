<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//tutti e tre importati dopo 
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {

            $project = new Project();
            $project->user_id = 1;
            $project->title = $faker->sentence(3);
            $project->slug = Str::slug($project->title, '-');
            // $project->logo = $faker->imageUrl(category: 'projects', format: 'jpg');
            $project->logo = 'placeholders/download.jpg';
            // <img src="{{ asset('img/photo.jpg') }}" alt="DC Logo" height="300" class="rounded-4 shadow">
            $project->link = $faker->url();
            $project->languages_used = $faker->sentence();
            $project->functionality = $faker->paragraphs(1, asText: true);
            $project->save();
        }
    }
}

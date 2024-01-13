<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = file_get_contents(__DIR__ . '/data/projects.json');
        $projects = json_decode($projects, true);
        foreach ($projects as $project) {
            $newProject = new Project();
            $newProject->user_id = 1;
            $newProject->title = $project['title'];
            $newProject->slug = Str::slug($project['title'], '-');
            $newProject->logo = $project['logo'];
            $newProject->image = $project['image'];
            $newProject->description = $project['description'];
            $newProject->save();
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@cmsvillalobos.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password123'),
                'is_admin' => true,
            ]
        );

        $skills = [
            ['name' => 'Laravel', 'category' => 'Backend', 'proficiency' => 95, 'sort_order' => 1],
            ['name' => 'PHP', 'category' => 'Backend', 'proficiency' => 92, 'sort_order' => 2],
            ['name' => 'Flutter', 'category' => 'Mobile', 'proficiency' => 88, 'sort_order' => 3],
            ['name' => 'Dart', 'category' => 'Mobile', 'proficiency' => 84, 'sort_order' => 4],
            ['name' => 'MySQL', 'category' => 'Database', 'proficiency' => 86, 'sort_order' => 5],
            ['name' => 'Tailwind CSS', 'category' => 'Frontend', 'proficiency' => 94, 'sort_order' => 6],
            ['name' => 'JavaScript', 'category' => 'Frontend', 'proficiency' => 85, 'sort_order' => 7],
            ['name' => 'Git', 'category' => 'Tools', 'proficiency' => 90, 'sort_order' => 8],
        ];

        foreach ($skills as $skill) {
            Skill::updateOrCreate(['name' => $skill['name']], $skill);
        }

        $this->call(ProjectSeeder::class);

        $settings = [
            ['key' => 'site_name', 'value' => 'Carlos Miguel S. Villalobos', 'type' => 'text'],
            ['key' => 'site_tagline', 'value' => 'Full-Stack Developer', 'type' => 'text'],
            ['key' => 'email', 'value' => 'villaloboscarlosmiguel@gmail.com', 'type' => 'text'],
            ['key' => 'github_url', 'value' => '#', 'type' => 'text'],
            ['key' => 'linkedin_url', 'value' => '#', 'type' => 'text'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}

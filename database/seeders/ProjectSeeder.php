<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Baby Day Tracker',
                'slug' => 'baby-day-tracker',
                'excerpt' => 'A calm Flutter care companion for feeding, sleep, diapers, vaccines, appointments, memories, reminders, and pediatrician-ready exports.',
                'description' => "Baby Day Tracker is a mobile-first care log built around the real rhythm of parents and caregivers.\n\nThe app includes home summaries, feeding and sleep trackers, diaper and health logs, vaccine schedules, calendar appointments, reminders, memories, milestones, baby book exports, local notifications, JSON backup, and pediatrician-friendly PDF export.\n\nUX direction: soft pastel surfaces, rounded touch targets, reassuring copy, low-stress navigation, and marketing screenshots that show the app as a calm daily companion rather than a clinical tracker.",
                'category' => 'Mobile App',
                'technologies' => ['Flutter', 'Dart', 'Riverpod', 'Hive', 'Local Notifications', 'PDF Export'],
                'featured' => true,
                'published' => true,
                'sort_order' => 1,
                'demo_url' => '#',
                'github_url' => 'https://github.com/CMViIlalobos/baby_day_tracker',
                'published_at' => now(),
                'cover_image' => 'project-assets/baby-day-phone-collage-classic.png',
                'images' => [],
            ],
            [
                'title' => 'HRIS',
                'slug' => 'hris',
                'excerpt' => 'A large Laravel HR operations platform for employee records, PDS data, plantilla, recruitment, competency, reports, monitoring, and admin controls.',
                'description' => "HRIS is an operations-heavy Laravel system shaped around employee data and internal HR workflows.\n\nThe real interface includes a branded PPA HRIS login, a dark left navigation shell, global module search, notification access, RSP dashboard cards, responsibility-center charts, employee personal information forms, exportable PDS records, and TRoPPA probationary monitoring analytics.\n\nThe repo also includes module management, maintenance mode, real-time monitoring, system diagnostics, user and permission management, HRMD library files, employee details, PDS sections, plantilla inventory, historical plantilla uploads, position codes, recruitment analytics, calendars, custom report builders, talent bank records, appointees, competency assessment, learning and development, notifications, global search, and export/report flows.\n\nUX direction: dense but scannable dashboards, predictable tables and filters, role-aware navigation, clear warning states before destructive navigation, and administrative screens built for repeated daily use.",
                'category' => 'Enterprise System',
                'technologies' => ['Laravel', 'PHP', 'MySQL', 'Blade', 'Bootstrap', 'ApexCharts', 'Echo'],
                'featured' => true,
                'published' => true,
                'sort_order' => 2,
                'demo_url' => '#',
                'github_url' => 'https://github.com/Josh362016/ppa_hris_2025',
                'published_at' => now()->subDays(8),
                'cover_image' => 'project-assets/hris-dashboard.png',
                'images' => [
                    'project-assets/hris-login.png',
                    'project-assets/hris-pds.png',
                    'project-assets/hris-troppa.png',
                ],
            ],
            [
                'title' => 'ORAS of PPA',
                'slug' => 'oras-of-ppa',
                'excerpt' => 'A Laravel + React/Inertia public-service travel appointment and QR verification system for PPA passenger and vessel workflows.',
                'description' => "ORAS of PPA is a public-service workflow system for travel appointments, passenger registration, OTP verification, QR generation, QR scanning, vessel schedules, reservations, walk-ins, travel history, PPA dashboards, executive analytics, shipping-line views, and admin controls.\n\nThe real entry screen presents government and agency branding, a clear ORAS identity, current environment status, bilingual language selection, Privacy Notice, EULA, Help links, and an eligibility warning for RoRo passengers before users begin.\n\nThe repo includes Laravel Fortify, Inertia React pages, TypeScript, Tailwind, Radix UI components, Lucide icons, OTP throttling, queued mail notifications, QR expiration rules, schedule-change notifications, protected media, activity logs, and k6 performance test flows.\n\nUX direction: trustworthy government-branded public entry flows, clear schedule selection, privacy-first onboarding, dependable OTP and QR states, verifier-first scanning screens, and operations dashboards that separate public registration from internal monitoring.",
                'category' => 'Government Workflow',
                'technologies' => ['Laravel', 'Inertia React', 'TypeScript', 'Tailwind CSS', 'Fortify', 'QR/OTP'],
                'featured' => true,
                'published' => true,
                'sort_order' => 3,
                'demo_url' => '#',
                'github_url' => 'https://github.com/iceaceice/otaqs',
                'published_at' => now()->subDays(14),
                'cover_image' => 'project-assets/oras-language-selection.png',
                'images' => [
                    'project-assets/oras-final-960.png',
                ],
            ],
        ];

        Project::whereNotIn('slug', collect($projects)->pluck('slug'))->delete();

        foreach ($projects as $project) {
            Project::updateOrCreate(['slug' => $project['slug']], $project);
        }
    }
}

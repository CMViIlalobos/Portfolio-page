<?php

namespace App\Support;

use Illuminate\Support\Collection;

class PortfolioProjects
{
    public static function mergeWith(iterable $projects): Collection
    {
        return collect($projects)
            ->concat(self::concepts())
            ->unique('slug')
            ->values();
    }

    public static function all(): Collection
    {
        return self::mergeWith(self::realProjects());
    }

    public static function concepts(): Collection
    {
        return collect([
            self::make([
                'title' => 'LaunchKit',
                'slug' => 'launchkit-saas',
                'excerpt' => 'A boilerplate and starter kit for launching SaaS applications faster with authentication, payments, dashboards, and more.',
                'category' => 'SaaS',
                'technologies' => ['Next.js', 'Tailwind CSS', 'Stripe', 'PostgreSQL', 'Auth.js'],
                'cover_image' => 'project-assets/launchkit-saas.png',
                'sort_order' => 4,
            ]),
            self::make([
                'title' => 'Harbor Cafe',
                'slug' => 'harbor-cafe',
                'excerpt' => 'A restaurant website with online reservations, digital menu, and admin dashboard for order and table management.',
                'category' => 'Web App',
                'technologies' => ['React', 'Node.js', 'MongoDB', 'Tailwind CSS', 'Resend'],
                'cover_image' => 'project-assets/harbor-cafe.png',
                'sort_order' => 5,
            ]),
            self::make([
                'title' => 'EstateFlow',
                'slug' => 'estateflow',
                'excerpt' => 'A property management platform for real estate agencies to manage listings, clients, and transactions efficiently.',
                'category' => 'SaaS',
                'technologies' => ['Next.js', 'TypeScript', 'Prisma', 'PostgreSQL', 'Tailwind CSS'],
                'cover_image' => 'project-assets/estateflow.png',
                'sort_order' => 6,
                'demo_url' => route('demos.real-estate', [], false),
            ]),
            self::make([
                'title' => 'ClinicQueue',
                'slug' => 'clinicqueue',
                'excerpt' => 'A queue and appointment management system for clinics and hospitals to streamline patient flow and scheduling.',
                'category' => 'SaaS',
                'technologies' => ['React', 'Node.js', 'PostgreSQL', 'Socket.io', 'Tailwind CSS'],
                'cover_image' => 'project-assets/clinicqueue.png',
                'sort_order' => 7,
            ]),
            self::make([
                'title' => 'TaskPilot',
                'slug' => 'taskpilot',
                'excerpt' => 'A modern project management tool for teams to organize tasks, collaborate, and track progress in real time.',
                'category' => 'SaaS',
                'technologies' => ['Next.js', 'TypeScript', 'Prisma', 'PostgreSQL', 'Pusher'],
                'cover_image' => 'project-assets/taskpilot.png',
                'sort_order' => 8,
            ]),
            self::make([
                'title' => 'Portfolio Studio',
                'slug' => 'portfolio-studio',
                'excerpt' => 'A portfolio builder platform for developers and designers to create beautiful, responsive portfolios without code.',
                'category' => 'SaaS',
                'technologies' => ['Next.js', 'Tailwind CSS', 'MDX', 'Vercel', 'PostgreSQL'],
                'cover_image' => 'project-assets/portfolio-studio.png',
                'sort_order' => 9,
            ]),
        ]);
    }

    private static function realProjects(): Collection
    {
        return collect([
            self::make([
                'title' => 'Baby Day Tracker',
                'slug' => 'baby-day-tracker',
                'excerpt' => 'A calm Flutter care companion for feeding, sleep, diapers, vaccines, appointments, memories, reminders, and pediatrician-ready exports.',
                'category' => 'Mobile App',
                'technologies' => ['Flutter', 'Dart', 'Riverpod', 'Hive', 'PDF Export'],
                'cover_image' => 'project-assets/baby-day-phone-collage-classic.png',
                'sort_order' => 1,
                'github_url' => 'https://github.com/CMViIlalobos/baby_day_tracker',
            ]),
            self::make([
                'title' => 'HRIS',
                'slug' => 'hris',
                'excerpt' => 'A large Laravel HR operations platform for employee records, PDS data, plantilla, recruitment, competency, reports, monitoring, and admin controls.',
                'category' => 'Enterprise System',
                'technologies' => ['Laravel', 'PHP', 'MySQL', 'Blade', 'ApexCharts'],
                'cover_image' => 'project-assets/hris-dashboard.png',
                'sort_order' => 2,
                'github_url' => 'https://github.com/Josh362016/ppa_hris_2025',
            ]),
            self::make([
                'title' => 'ORAS of PPA',
                'slug' => 'oras-of-ppa',
                'excerpt' => 'A Laravel + React/Inertia public-service travel appointment and QR verification system for PPA passenger and vessel workflows.',
                'category' => 'Government Workflow',
                'technologies' => ['Laravel', 'Inertia React', 'TypeScript', 'Tailwind CSS', 'QR/OTP'],
                'cover_image' => 'project-assets/oras-language-selection.png',
                'sort_order' => 3,
                'github_url' => 'https://github.com/iceaceice/otaqs',
            ]),
        ]);
    }

    private static function make(array $project): object
    {
        return (object) array_merge([
            'description' => self::description($project['title'], $project['excerpt']),
            'images' => [],
            'demo_url' => null,
            'github_url' => null,
            'cover_image' => null,
            'featured' => true,
            'published' => true,
            'published_at' => now(),
        ], $project);
    }

    private static function description(string $title, string $excerpt): string
    {
        return "{$title} is presented as a focused product landing page concept inside this portfolio.\n\n{$excerpt}\n\nThe goal is to show how a product could be framed clearly: headline, audience, conversion path, feature hierarchy, stack choices, and a calm interface direction that stays readable on mobile and desktop.";
    }
}

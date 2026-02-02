<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Project;
use App\Models\Skill;
use App\Models\SiteSetting;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::firstOrCreate(
            ['email' => 'admin@cmsvillalobos.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password123'),
                'is_admin' => true,
            ]
        );

        // Create sample skills
        $skills = [
            ['name' => 'Laravel', 'category' => 'Backend', 'proficiency' => 95],
            ['name' => 'Vue.js', 'category' => 'Frontend', 'proficiency' => 90],
            ['name' => 'PHP', 'category' => 'Backend', 'proficiency' => 90],
            ['name' => 'MySQL', 'category' => 'Database', 'proficiency' => 85],
            ['name' => 'Tailwind CSS', 'category' => 'Frontend', 'proficiency' => 95],
            ['name' => 'JavaScript', 'category' => 'Frontend', 'proficiency' => 85],
            ['name' => 'Git', 'category' => 'Tools', 'proficiency' => 90],
            ['name' => 'Docker', 'category' => 'DevOps', 'proficiency' => 75],
        ];

        foreach ($skills as $skill) {
            Skill::firstOrCreate(['name' => $skill['name']], $skill);
        }

        // Create sample projects with images (using Picsum for instant loading)
        $projects = [
            [
                'title' => 'Smart POS & Inventory System',
                'slug' => 'smart-pos-inventory',
                'excerpt' => 'A comprehensive Point of Sale and Inventory management system for retail businesses.',
                'description' => "A robust Point of Sale (POS) and Inventory Management System designed to streamline retail operations. \n\nKey features include:\n- Real-time inventory tracking with low stock alerts\n- Barcode scanning support\n- Sales reporting and analytics dashboard\n- Multi-branch support\n- User role management (Admin, Cashier, Manager)\n- Invoice generation and thermal printing support",
                'category' => 'Web Application',
                'technologies' => json_encode(['Laravel', 'Vue.js', 'MySQL', 'Tailwind CSS', 'Chart.js']),
                'featured' => true,
                'published' => true,
                'sort_order' => 1,
                'demo_url' => '#',
                'github_url' => '#',
                'published_at' => now(),
                'cover_image' => 'https://image.pollinations.ai/prompt/modern%20point%20of%20sale%20system%20dashboard%20interface%20dark%20mode?nologo=true',
                'images' => [
                    'https://image.pollinations.ai/prompt/pos%20system%20checkout%20screen%20interface?nologo=true',
                    'https://image.pollinations.ai/prompt/inventory%20management%20dashboard%20ui?nologo=true',
                    'https://image.pollinations.ai/prompt/sales%20analytics%20charts%20dashboard?nologo=true'
                ]
            ],
            [
                'title' => 'HealthCare Appointment Platform',
                'slug' => 'healthcare-appointment-platform',
                'excerpt' => 'Telemedicine and booking platform connecting patients with doctors.',
                'description' => "An integrated healthcare platform that simplifies the process of booking appointments with doctors. \n\nFeatures:\n- Doctor search by specialty and availability\n- Online appointment booking and rescheduling\n- Video consultation integration (WebRTC)\n- Electronic Health Records (EHR) for patients\n- Automated email and SMS reminders\n- Secure payment gateway for consultation fees",
                'category' => 'Web Application',
                'technologies' => json_encode(['Laravel', 'Livewire', 'Alpine.js', 'PostgreSQL', 'Stripe']),
                'featured' => true,
                'published' => true,
                'sort_order' => 2,
                'demo_url' => '#',
                'github_url' => '#',
                'published_at' => now()->subDays(5),
                'cover_image' => 'https://image.pollinations.ai/prompt/modern%20doctor%20appointment%20booking%20website%20landing%20page%20clean%20medical%20blue%20ui?nologo=true',
                'images' => [
                    'https://image.pollinations.ai/prompt/find%20a%20doctor%20search%20interface%20with%20filters%20and%20doctor%20cards%20medical%20ui?nologo=true',
                    'https://image.pollinations.ai/prompt/patient%20portal%20dashboard%20with%20upcoming%20appointments%20and%20health%20records%20clean%20ui?nologo=true',
                    'https://image.pollinations.ai/prompt/telehealth%20video%20consultation%20interface%20doctor%20and%20patient%20split%20screen%20ui?nologo=true'
                ]
            ],
            [
                'title' => 'Real-Estate Property Marketplace',
                'slug' => 'real-estate-marketplace',
                'excerpt' => 'Modern property listing platform with map integration and virtual tours.',
                'description' => "A high-performance real estate marketplace allowing agents to list properties and buyers to find their dream homes.\n\nHighlights:\n- Interactive map search (Google Maps API)\n- 360-degree virtual tour support\n- Advanced filtering (Price, Location, Amenities)\n- Agent dashboard for lead management\n- Saved searches and property alerts\n- SEO optimized property pages",
                'category' => 'Web Application',
                'technologies' => json_encode(['Laravel', 'Inertia.js', 'React', 'Redis', 'Google Maps API']),
                'featured' => true,
                'published' => true,
                'sort_order' => 3,
                'demo_url' => route('demos.real-estate'),
                'github_url' => '#',
                'published_at' => now()->subDays(10),
                'cover_image' => 'https://image.pollinations.ai/prompt/luxury%20modern%20house%20exterior%20with%20real%20estate%20listing%20ui%20overlay?nologo=true',
                'images' => [
                    'https://image.pollinations.ai/prompt/real%20estate%20website%20property%20grid%20view?nologo=true',
                    'https://image.pollinations.ai/prompt/property%20details%20page%20ui%20design?nologo=true',
                    'https://image.pollinations.ai/prompt/real%20estate%20agent%20dashboard%20ui?nologo=true'
                ]
            ],
            [
                'title' => 'LMS - E-Learning Portal',
                'slug' => 'lms-elearning-portal',
                'excerpt' => 'Learning Management System for online courses and student progress tracking.',
                'description' => "A scalable Learning Management System (LMS) for educational institutions and online instructors.\n\nCore Functionalities:\n- Course creation and curriculum management\n- Video lesson hosting and streaming\n- Student quizzes and assessments\n- Progress tracking and certification\n- Discussion forums for peer interaction\n- Subscription-based revenue model",
                'category' => 'Education',
                'technologies' => json_encode(['Laravel', 'Vue.js', 'Video.js', 'MySQL', 'AWS S3']),
                'featured' => false,
                'published' => true,
                'sort_order' => 4,
                'demo_url' => '#',
                'github_url' => '#',
                'published_at' => now()->subDays(15),
                'cover_image' => 'https://image.pollinations.ai/prompt/online%20learning%20platform%20student%20dashboard%20interface?nologo=true',
                'images' => [
                    'https://image.pollinations.ai/prompt/online%20course%20video%20player%20interface?nologo=true',
                    'https://image.pollinations.ai/prompt/student%20progress%20tracker%20dashboard%20ui?nologo=true',
                    'https://image.pollinations.ai/prompt/online%20quiz%20interface%20design?nologo=true'
                ]
            ],
            [
                'title' => 'FinTrack - Expense Manager',
                'slug' => 'fintrack-expense-manager',
                'excerpt' => 'Personal finance tracker with budget planning and visual insights.',
                'description' => "A personal finance application helping users track expenses, set budgets, and visualize spending habits.\n\nIncludes:\n- Expense categorization and tagging\n- Monthly budget planning tools\n- Visual charts for spending analysis\n- Recurring transaction support\n- Multi-currency support\n- Data export to CSV/PDF",
                'category' => 'Mobile/Web',
                'technologies' => json_encode(['Laravel API', 'Flutter', 'SQLite', 'Firebase Auth']),
                'featured' => false,
                'published' => true,
                'sort_order' => 5,
                'demo_url' => '#',
                'github_url' => '#',
                'published_at' => now()->subDays(20),
                'cover_image' => 'https://image.pollinations.ai/prompt/mobile%20banking%20app%20interface%20dark%20mode%20financial%20charts?nologo=true',
                'images' => [
                    'https://image.pollinations.ai/prompt/expense%20tracker%20app%20ui%20design?nologo=true',
                    'https://image.pollinations.ai/prompt/budget%20planning%20app%20interface?nologo=true',
                    'https://image.pollinations.ai/prompt/financial%20analytics%20mobile%20dashboard?nologo=true'
                ]
            ],
            [
                'title' => 'SocialConnect API',
                'slug' => 'social-connect-api',
                'excerpt' => 'RESTful API backend for a social networking mobile application.',
                'description' => "A high-performance RESTful API built to power a social networking mobile app.\n\nTechnical Specs:\n- OAuth2 Authentication (Passport/Sanctum)\n- Endpoints for user profiles, posts, comments, and likes\n- Real-time notification system using Pusher\n- Image optimization and storage\n- Rate limiting and security middleware\n- Comprehensive API documentation (Swagger/OpenAPI)",
                'category' => 'Backend API',
                'technologies' => json_encode(['Laravel', 'Redis', 'Docker', 'Swagger', 'PHPUnit']),
                'featured' => false,
                'published' => true,
                'sort_order' => 6,
                'demo_url' => '',
                'github_url' => '#',
                'published_at' => now()->subDays(25),
                'cover_image' => 'https://image.pollinations.ai/prompt/mobile%20social%20media%20app%20feed%20interface%20dark%20mode?nologo=true',
                'images' => [
                    'https://image.pollinations.ai/prompt/social%20media%20user%20profile%20ui?nologo=true',
                    'https://image.pollinations.ai/prompt/mobile%20app%20chat%20interface%20design?nologo=true',
                    'https://image.pollinations.ai/prompt/api%20documentation%20page%20dark%20theme?nologo=true'
                ]
            ]
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(['slug' => $project['slug']], $project);
        }

        // Create site settings
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

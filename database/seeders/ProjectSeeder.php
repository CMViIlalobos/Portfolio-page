<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        // Optional: Clear existing projects to avoid duplicates if re-running
        // DB::table('projects')->truncate(); 
        // Note: Truncate can be dangerous in production, but fine for dev setup.
        // For now, I'll just check if they exist or I'll just rely on the user saying it's empty.
        // Safest is to just create them.

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
                'cover_image' => 'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=modern+dashboard+interface+of+point+of+sale+system+dark+mode+analytics+charts+product+list&image_size=landscape_16_9',
                'images' => [
                    'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=pos+system+checkout+screen+dark+mode+retail+interface&image_size=landscape_16_9',
                    'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=inventory+management+dashboard+dark+ui+stock+levels&image_size=landscape_16_9',
                    'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=sales+analytics+report+charts+dark+theme+dashboard&image_size=landscape_16_9'
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
                'cover_image' => 'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=modern+healthcare+platform+homepage+doctor+booking+clean+blue+ui&image_size=landscape_16_9',
                'images' => [
                    'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=doctor+profile+page+appointment+booking+calendar+clean+ui&image_size=landscape_16_9',
                    'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=patient+dashboard+medical+records+health+stats+clean+interface&image_size=landscape_16_9',
                    'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=telemedicine+video+call+interface+doctor+patient+consultation&image_size=landscape_16_9'
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
                'demo_url' => '#',
                'github_url' => '#',
                'published_at' => now()->subDays(10),
                'cover_image' => 'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=modern+real+estate+website+homepage+luxury+homes+hero+section&image_size=landscape_16_9',
                'images' => [
                    'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=property+listing+page+grid+view+filters+map+clean+ui&image_size=landscape_16_9',
                    'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=property+details+page+gallery+virtual+tour+agent+contact&image_size=landscape_16_9',
                    'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=real+estate+agent+dashboard+leads+analytics+dark+mode&image_size=landscape_16_9'
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
                'cover_image' => 'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=online+learning+platform+course+dashboard+video+player+modern+ui&image_size=landscape_16_9',
                'images' => [
                    'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=student+dashboard+progress+tracking+courses+grid+clean+interface&image_size=landscape_16_9',
                    'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=course+curriculum+view+video+lesson+sidebar+modern+ui&image_size=landscape_16_9',
                    'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=online+quiz+interface+multiple+choice+timer+clean+design&image_size=landscape_16_9'
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
                'cover_image' => 'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=personal+finance+dashboard+dark+mode+expense+tracker+charts&image_size=landscape_16_9',
                'images' => [
                    'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=mobile+app+expense+tracker+list+view+clean+dark+ui&image_size=portrait_16_9',
                    'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=budget+planning+screen+progress+bars+clean+interface&image_size=portrait_16_9',
                    'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=financial+reports+pie+charts+spending+analysis+dark+mode&image_size=portrait_16_9'
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
                'cover_image' => 'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=api+documentation+swagger+ui+dark+mode+code+snippets&image_size=landscape_16_9',
                'images' => [
                    'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=postman+api+testing+interface+json+response+dark+theme&image_size=landscape_16_9',
                    'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=database+schema+diagram+relationship+visualizer+dark+mode&image_size=landscape_16_9',
                    'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=server+metrics+dashboard+terminal+logs+monitoring&image_size=landscape_16_9'
                ]
            ]
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['slug' => $project['slug']], // Check by slug to avoid duplicates
                $project
            );
        }
    }
}

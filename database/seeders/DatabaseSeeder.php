<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\HeroContent;
use App\Models\Reference;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $sourcePath = database_path('seeders/images');

        Storage::disk('public')->makeDirectory('hero');
        Storage::disk('public')->makeDirectory('references');

        $heroImage = 'hero-placeholder.jpg';
        if (File::exists("$sourcePath/$heroImage")) {
            File::copy("$sourcePath/$heroImage", storage_path("app/public/hero/$heroImage"));
            
            HeroContent::create([
                'title' => 'Tárgyak, amelyek kiállják az idő próbáját',
                'description' => 'Letisztult ipari formatervezés a koncepciótól a sorozatgyártásig — felesleges díszítés nélkül.',
                'background_image' => "hero/$heroImage",
            ]);
        }

        $references = [
            [
                'title' => 'Acél kényelmi eszközök',
                'date' => '2026-05-28',
                'image' => 'ref-1.jpg'
            ],
            [
                'title' => 'Beltéri szerkezetek és térelválasztók',
                'date' => '2026-05-14',
                'image' => 'ref-2.jpg'
            ],
            [
                'title' => 'Kültéri építészeti megoldások',
                'date' => '2026-04-30',
                'image' => 'ref-3.jpg'
            ],
            [
                'title' => 'Egyedi fémszerkezetek',
                'date' => '2026-04-12',
                'image' => 'ref-4.jpg'
            ],
        ];

        foreach ($references as $ref) {
            $imageName = $ref['image'];
            
            if (File::exists("$sourcePath/$imageName")) {
                File::copy("$sourcePath/$imageName", storage_path("app/public/references/$imageName"));
            }
            
            Reference::updateOrCreate(
                ['title' => $ref['title']],
                [
                    'project_date' => $ref['date'],
                    'image_path' => "references/$imageName",
                ]
            );
        }

        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
            ]
        );
    }
}

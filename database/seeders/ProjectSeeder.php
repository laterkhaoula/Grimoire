<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\User;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        // إنشاء مشروع تجريبي
        $project = Project::create([
            'title' => 'Projet Recherche IA',
            'description' => 'Projet de recherche en intelligence artificielle',
            'status' => 'en_cours',
            'avancement' => 50,
        ]);


        // جلب مستخدمين موجودين
        $user = User::first();


        // ربط المستخدم بالمشروع
        if ($user) {

            $project->users()->attach($user->id, [
                'role' => 'responsable'
            ]);

        }
    }
}

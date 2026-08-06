<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // إنشاء User تجريبي
        User::create([
            'name' => 'Maryem',
            'email' => 'maryem@example.com',
            'password' => Hash::make('password123'),
        ]);


        // تشغيل ProjectSeeder
        $this->call([
            ProjectSeeder::class,
        ]);
    }
}
<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = Admin::create([
            'email' => 'juan08@gmail.com',
            'password' => bcrypt('juan2003'),
        ]);
        $admin->assignRole('admin');
    }
}

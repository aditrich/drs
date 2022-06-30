<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Richard Wilson',
            'email' => 'richardmwilson191@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ]);

        for ($i = 0; $i < 2; $i++) {
            User::factory()->create()->assignRole('collection_manager');
        }

        for ($i = 0; $i < 8; $i++) {
            User::factory()->create()->assignRole('collection_officer');
        }

        $admin->assignRole('admin');
    }
}

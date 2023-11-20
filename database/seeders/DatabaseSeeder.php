<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user1 = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);

        $user2 = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'user@admin.com',
            'password' => bcrypt('admin'),
        ]);
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        $user1->roles()->sync($admin);
        $user2->roles()->sync($user);
    }
}

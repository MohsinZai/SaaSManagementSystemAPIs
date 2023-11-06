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
        User::factory()
            ->count(1)
            ->create()
            ->each(
                function ($user) { 
            $user->assignRole('super-admin');  

    });
        User::factory()
        ->count(5)
        ->create()
        ->each(function($user) {
            $user->assignRole('agent');
    });
    
        User::factory()
        ->count(4)
        ->create()
        ->each(function($user) {
            $user->assignRole('user');
    });

    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(20)->create();

        $user = User::find(1);

        $user->email = 'luoli6860@gmail.com';
        $user->password = bcrypt('password');
        $user->is_admin = true;
        $user->name = 'admin';

        $user->update();
    }
}

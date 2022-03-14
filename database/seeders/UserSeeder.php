<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'email' => 'huy@jigear.com',
            'password' => bcrypt('password'),
            'first_name' => 'Lê',
            'last_name' => 'Chí Huy',
            'gender' => '0',
            'email_verified_at' => now(),
            'role' => 'admin',
        ]);

        User::create([
            'email' => 'hao@jigear.com',
            'password' => bcrypt('password'),
            'first_name' => 'Bùi',
            'last_name' => 'Nhật Hào',
            'gender' => '0',
            'email_verified_at' => now(),
            'role' => 'admin',
        ]);

        User::create([
            'email' => 'tan@jigear.com',
            'password' => bcrypt('password'),
            'first_name' => 'Nguyễn',
            'last_name' => 'Hoàng Tấn',
            'gender' => '0',
            'email_verified_at' => now(),
            'role' => 'admin',
        ]);
    }
}

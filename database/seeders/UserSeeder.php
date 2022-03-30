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
            'email' => 'huy@jigear.xyz',
            'password' => bcrypt('password'),
            'first_name' => 'Lê',
            'last_name' => 'Chí Huy',
            'gender' => '0',
            'email_verified_at' => now(),
            'role' => 'admin',
        ]);

        User::create([
            'email' => 'hao@jigear.xyz',
            'password' => bcrypt('password'),
            'first_name' => 'Bùi',
            'last_name' => 'Nhật Hào',
            'gender' => '0',
            'email_verified_at' => now(),
            'role' => 'admin',
        ]);

        User::create([
            'email' => 'tan@jigear.xyz',
            'password' => bcrypt('password'),
            'first_name' => 'Nguyễn',
            'last_name' => 'Hoàng Tấn',
            'gender' => '0',
            'email_verified_at' => now(),
            'role' => 'admin',
        ]);

        $customer = User::create([
            'email' => 'guest@gmail.com',
            'password' => bcrypt('password'),
            'first_name' => 'Khách',
            'last_name' => 'Hàng',
            'gender' => '0',
            'email_verified_at' => now(),
            'role' => 'customer',
        ]);

        $customer->deliveryAddresses()->create([
            'address' => '144/15 Bình Lợi, Bình Thạnh',
            'phone_number' => '0933160483'
        ]);
    }
}

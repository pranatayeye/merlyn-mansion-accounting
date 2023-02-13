<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Merlyn Villa',
                'position' => 'Owner',
                'email' => 'owner@merlynvilla.com',
                'password' => 'password',
            ],
            [
                'name' => 'Finance',
                'position' => 'Finance',
                'email' => 'finance@merlynvilla.com',
                'password' => 'password',
            ],
        ];

        foreach ($data as $item) {
            User::insert([
                'name' => $item['name'],
                'position' => $item['position'],
                'email' => $item['email'],
                'password' => Hash::make($item['password']),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        };
    }
}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DefaultTestingUsers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user1 = User::factory()->create([
            'name' => 'User Worktopia',
            'email' => 'user@worktopia.com',
            'password' => Hash::make('123'),
            'email_verified_at' => Carbon::now(),
            'remember_token' => null
        ]);

        return $user1;
    }
}

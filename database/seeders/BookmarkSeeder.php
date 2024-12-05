<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Work;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        # Get a list of all user IDs
        $userIDs = User::pluck('id')->toArray();

        # Select 3 random user IDs
        $randomUserIDs = array_rand($userIDs, 3);

        # Get all job IDs
        $jobIDs = Work::pluck('id')->toArray();

        # Randomly select 3 job IDs for each user
        foreach ($randomUserIDs as $randomUserID) {
            $testUser = User::findOrFail($userIDs[$randomUserID]);
            $randomJobIDs = array_rand($jobIDs, 3);

            foreach ($randomJobIDs as $jobID) {
                $testUser->bookmarkedJobs()->attach($jobIDs[$jobID]);
            }
        }
    }
}

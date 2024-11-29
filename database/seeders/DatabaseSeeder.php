<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Delete only image files from the specified directory on the given disk.
     *
     * @param string $disk The name of the disk.
     * @param string $directory The directory from which to delete image files.
     * @return void
     */
    private function deleteFilesOnly(string $disk, string $directory = ''): void
    {
        // Get all files from the directory
        $files = Storage::disk($disk)->files($directory);

        // Filter and delete only image files, except .gitignore files
        foreach ($files as $file) {
            if (basename($file) !== '.gitignore') {
                Storage::disk($disk)->delete($file);
            }
        }
        echo __("Deleting all files except .gitignore");
    }

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Delete only image files from the logo directory
        $this->deleteFilesOnly('logo', '');

        $this->call(DefaultTestingUsers::class);

        User::factory(4)->create();

        $this->call(WorkSeeder::class);
    }
}

<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

trait FileUploadTrait
{
    /**
     * Function to upload a file or update this file. If an old file exists, it will be removed.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $inputName The name of the file input field in the request.
     * @param string|null $oldPath The path to the old file. If it exists, this file will be deleted.
     * @param string $disk The name of the disk where the file will be uploaded.
     * @param string|null $directory The directory where the file will be stored within the disk.
     * @param string $media The base name for the uploaded file.
     * @param string $storage The storage where the file is located.
     */
    public function upsertFile(
        Request $request,
        string $inputName,
        ?string $oldPath = null,
        string $disk,
        ?string $directory = null,
        string $media = 'File Media',
        string $storage
    ): ?string {
        if ($request->hasFile($inputName)) {
            $file = $request->file($inputName);

            $extension = $file->getClientOriginalExtension();
            $fileName = Str::slug($media) . '_' . uniqid() . '.' . $extension;

            // Store the new file on the specified disk and directory
            $filePath = $file->storeAs($directory ?? '', $fileName, $disk);
            Log::info(__('New file stored at: :path', ['path' => $filePath])); // Debugging: Log new file path

            // Delete the old file if it exists
            if ($oldPath) {
                $this->deleteFile($oldPath, $disk, $storage);
            }

            return Storage::disk($disk)->url($filePath);
        }

        return $oldPath;
    }

    /**
     * Delete a file from the specified disk.
     *
     * @param string $path The path to the file to be deleted. If it is a full URL, it will be parsed to get the file name.
     * @param string $disk The name of the disk where the file is stored. Example: 'logo'.
     * @param string $storage The subdirectory within the storage path where the file is located. Example: 'logo/'.
     * @return void
     */
    public function deleteFile(string $path, string $disk, string $storage): void
    {
        if (filter_var($path, FILTER_VALIDATE_URL)) {
            $parsedUrl = parse_url($path);
            $path = basename($parsedUrl['path']);
        }

        $fullPath = storage_path('app/files/' . $storage . $path);
        Log::info(__('Checking if old file exists at: :path', ['path' => $fullPath])); // Debugging: Log full path for verification

        if (file_exists($fullPath)) {
            unlink($fullPath);
            Log::info(__('Deleted old file: :path', ['path' => $fullPath])); // Debugging: Log successful deletion
        } else {
            Log::info(__('Old file does not exist or cannot be found: :path', ['path' => $fullPath])); // Debugging: Log if the file does not exist
        }
    }
}

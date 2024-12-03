<?php

namespace App\Http\Controllers\Auth\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AvatarController extends Controller
{
    use FileUploadTrait;

    /**
     * @desc Upsert the avatar for the logged user.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $request->validate([
            'avatar' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif', 'max:1024']
        ]);

        # Check if user uploaded avatar
        $avatarPath = $this->upsertFile($request, 'avatar', $request->old_avatar, 'avatar', null, 'Avatar', 'avatar/');

        $user->avatar = !empty($avatarPath) ? $avatarPath : $request->old_avatar;

        $request->user()->save();

        $message = __('Your data has been updated successfully!');

        return Redirect::route('dashboard')->with('success', $message);
    }
}

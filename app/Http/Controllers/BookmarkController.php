<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = Auth::user();
        $bookmarks = $user->bookmarkedJobs()->paginate(9);

        return view('bookmark.index')->with('bookmarks', $bookmarks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Work $work): RedirectResponse
    {
        $user = Auth::user();

        if ($user->bookmarkedJobs()->where('work_id', $work->id)->exists()) {
            $message = __('This job is already associated with this bookmark');
            return back()->with('warning', $message);
        }

        # Create a new bookmark
        $user->bookmarkedJobs()->attach($work->id);
        $message = __('Job bookmarked successfully!');
        return back()->with('success', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Work $work)
    {
        $user = Auth::user();

        if (!$user->bookmarkedJobs()->where('work_id', $work->id)->exists()) {
            $message = __('This job is not bookmarked');
            return back()->with('error', $message);
        }

        # Create a new bookmark
        $user->bookmarkedJobs()->detach($work->id);
        $message = __('Bookmark removed successfully!');
        return back()->with('success', $message);
    }
}

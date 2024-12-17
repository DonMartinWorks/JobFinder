<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    /**
     * Search any given search term.
     */
    public function __invoke(Request $request): View
    {
        $keywords = strtolower($request->input('keywords'));
        $location = strtolower($request->input('location'));

        $query = Work::query();

        // Search all keywords in the search term.
        if ($keywords) {
            $query->where('status', 1)
                ->where(function ($q) use ($keywords) {
                    $q->whereRaw('LOWER(title) like ?', ['%' . $keywords . '%'])
                        ->orWhereRaw('LOWER(description) like ?', ['%' . $keywords . '%'])
                        ->orWhereRaw('LOWER(tags) like ?', ['%' . $keywords . '%']);
                });
        }

        // Search all locations in the search term.
        if ($location) {
            $query->where('status', 1)
                ->where(function ($q) use ($location) {
                    $q->whereRaw('LOWER(address) like ?', ['%' . $location . '%'])
                        ->orWhereRaw('LOWER(city) like ?', ['%' . $location . '%'])
                        ->orWhereRaw('LOWER(state) like ?', ['%' . $location . '%'])
                        ->orWhereRaw('LOWER(zipcode) like ?', ['%' . $location . '%']);
                });
        }

        $works = $query->paginate(9);

        return view('jobs.index')->with('works', $works);
    }
}

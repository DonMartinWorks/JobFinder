<?php

namespace App\Services;

use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkService
{

    /**
     * Assigns the attributes from the request ($request) to a Work model ($work).
     *
     *
     * @param Work $work The Work model to which the attributes will be assigned.
     * @param Request $request The HTTP request containing the data submitted by the user.
     */
    public function assignAttributes(Work $work, Request $request): void
    {
        // Extract the src from the iframe
        $mapLink = $request->input('map_link');
        if (!empty($mapLink) && preg_match('/src="([^"]+)"/', $mapLink, $match)) {
            $mapLink = $match[1];
        }

        // Use the fill method to assign the request's values to the Work model's attributes.
        $work->fill($request->only([
            'title',
            'description',
            'salary',
            'tags',
            'job_type',
            'remote',
            'requirements',
            'benefits',
            'address',
            'map_link',
            'city',
            'state',
            'zipcode',
            'contact_email',
            'contact_phone',
            'company_name',
            'company_description',
            'company_website'
        ]));

        // Assign the authenticated user's ID to the work.
        $work->user_id = Auth::id();

        // Convert the status value from the request to a boolean and assign it to the work.
        $work->status = $request->boolean('status');

        // Assign the extracted map_link
        $work->map_link = $mapLink;
    }
}

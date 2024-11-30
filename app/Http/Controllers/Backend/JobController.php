<?php

namespace App\Http\Controllers\Backend;

use App\Models\Work;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UpsertJobRequest;

class JobController extends Controller
{
    use FileUploadTrait;


    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $works = Work::where('status', 1)->get();

        return view('jobs.index')->with('works', $works);
    }

    /**
     * All the columns who cames from the model.
     */
    public function columns(Work $work, mixed $request): void
    {
        $work->user_id = Auth::user()->id;
        $work->title = $request->title;
        $work->description = $request->description;
        $work->salary = $request->salary;
        $work->tags = $request->tags;
        $work->job_type = $request->job_type;
        $work->remote = $request->remote;
        $work->requirements = $request->requirements;
        $work->benefits = $request->benefits;
        $work->address = $request->address;
        $work->city = $request->city;
        $work->state = $request->state;
        $work->zipcode = $request->zipcode;
        $work->contact_email = $request->contact_email;
        $work->contact_phone = $request->contact_phone;
        $work->company_name = $request->company_name;
        $work->company_description = $request->company_description;
        $work->company_website = $request->company_website;
        $work->status = $request->boolean('status');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpsertJobRequest $request): RedirectResponse
    {
        $work = new Work();

        $this->columns($work, $request);

        # Saving the image.
        // TODO: Save the image
        $logoPath = $this->upsertFile($request, 'company_logo', null, 'logo', null, 'Company Logo', 'logo/');

        $work->company_logo = $logoPath;

        $work->save();

        // Toast Message
        $message = __('Job listing have been successfully created!');

        return redirect()->route('jobs.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Work $work): View
    {
        return view('jobs.show')->with('work', $work);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Work $work): View
    {
        return view('jobs.edit')->with('work', $work);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpsertJobRequest $request, Work $work): RedirectResponse
    {
        $this->columns($work, $request);

        # Saving the image.
        $logoPath = $this->upsertFile($request, 'company_logo', $request->old_company_logo, 'logo', null, 'Company Logo', 'logo/');

        $work->company_logo =  !empty($logoPath) ? $logoPath : $request->old_company_logo;

        $work->save();

        // Toast Message
        $message = __('Job listing have been successfully updated!');

        return redirect()->route('jobs.index')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $work = Work::findOrFail($id);

        // Log the action
        Log::info(__('Attempting to delete job with ID: :id', ['id' => $id]));

        $this->deleteFile($work->company_logo, 'logo', 'logo/');

        $work->delete();

        // Toast Message
        $message = __('Job listing have been successfully deleted!');

        return redirect()->route('jobs.index')->with('warning', $message);
    }
}

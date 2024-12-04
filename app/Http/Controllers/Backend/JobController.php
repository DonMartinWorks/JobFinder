<?php

namespace App\Http\Controllers\Backend;

use App\Models\Work;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Services\WorkService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UpsertJobRequest;

class JobController extends Controller
{
    use FileUploadTrait, AuthorizesRequests;

    protected $workService;

    public function __construct(WorkService $workService)
    {
        $this->workService = $workService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $works = Work::where('status', 1)->paginate(9);
        // $works = Work::where('status', 1)->simplePaginate(9);

        return view('jobs.index')->with('works', $works);
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

        $this->workService->assignAttributes($work, $request);

        # Saving the image.
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
        # Checking if the user has permission to update this resource.
        $this->authorize('update', $work);

        return view('jobs.edit')->with('work', $work);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpsertJobRequest $request, Work $work): RedirectResponse
    {
        # Checking if the user has permission to update this resource.
        $this->authorize('update', $work);

        $this->workService->assignAttributes($work, $request);

        # Saving the image.
        $logoPath = $this->upsertFile($request, 'company_logo', $request->old_company_logo, 'logo', null, 'Company Logo', 'logo/');

        $work->company_logo = !empty($logoPath) ? $logoPath : $request->old_company_logo;

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

        # Checking if the user has permission to delete this resource.
        $this->authorize('delete', $work);

        // Log the action
        Log::info(__('Attempting to delete job with ID: :id', ['id' => $id]));

        $this->deleteFile($work->company_logo, 'logo', 'logo/');

        $work->delete();

        $message = __('Job listing have been successfully deleted!');

        if (url()->previous() === route('dashboard')) {
            return redirect()->route('dashboard')->with('warning', $message);
        } else {
            return redirect()->route('jobs.index')->with('warning', $message);
        }

        // return redirect()->route('jobs.index')->with('warning', $message);
    }
}

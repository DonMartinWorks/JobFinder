<?php

namespace App\Http\Controllers\Backend;

use App\Models\Work;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ApplicantUpsertRequest;
use App\Mail\JobApplied as MailJobApplied;
use Attribute;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ApplicantController extends Controller
{
    use FileUploadTrait;

    /**
     * Handle the incoming request.
     */
    public function store(ApplicantUpsertRequest $request, Work $work): RedirectResponse
    {
        # Check if the user has already applied
        $existingApp = Applicant::where('work_id', $work->id)->where('user_id', auth()->id())->exists();
        if ($existingApp) {
            $message = __('You have already applied for this job.');
            return redirect()->back()->with('error', $message);
        }

        $resumePath = $this->upsertFile($request, 'resume_path', null, 'resume', null, 'Resume', 'resume/');

        $applicant = new Applicant();
        $applicant->resume_path = $resumePath;
        $applicant->full_name = $request->full_name;
        $applicant->contact_email = $request->contact_email;
        $applicant->contact_phone = $request->contact_phone;
        $applicant->message = $request->message;
        $applicant->location = $request->location;
        $applicant->user_id = auth()->id();
        $applicant->work_id = $work->id;
        $applicant->save();

        # Send the mail to owner
        Mail::to($work->user->email)->send(new MailJobApplied($applicant, $work));

        $message = __('Applicant have been successfully added!');

        return redirect()->back()->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $applicant = Applicant::findOrFail($id);

        // Log the action
        Log::info(__('Attempting to delete job with ID: :id', ['id' => $id]));

        $this->deleteFile($applicant->resume_path, 'resume', 'resume/');

        $applicant->delete();

        $message = __('Applicant have been successfully deleted!');

        return redirect()->route('jobs.index')->with('warning', $message);
    }
}

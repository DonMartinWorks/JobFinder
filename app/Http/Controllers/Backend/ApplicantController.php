<?php

namespace App\Http\Controllers\Backend;

use App\Models\Work;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ApplicantUpsertRequest;

class ApplicantController extends Controller
{
    use FileUploadTrait;

    /**
     * Handle the incoming request.
     */
    public function index(ApplicantUpsertRequest $request, Work $work): RedirectResponse
    {
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


        $message = __('Applicant have been successfully added!');

        return redirect()->back()->with('success', $message);
    }
}

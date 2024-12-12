<x-layouts.master>
    <x-slot name="title">
        {{ __('Dashboard') }}
    </x-slot>

    <section class="flex flex-col md:flex-row gap-4 mb-5">
        <!-- AVATAR FORM -->
        <div class="bg-white p-8 rounded-lg shadow-md w-full">
            <h3 class="text-3xl text-center font-bold mb-4">{{ __('My Avatar') }}</h3>

            @include('forms.avatar')
        </div>

        <!-- PROFILE INFO FORM -->
        <div class="bg-white p-8 rounded-lg shadow-md w-full">
            <h3 class="text-3xl text-center font-bold mb-4">{{ __('Profile Information') }}</h3>

            @include('forms.profile')
        </div>
    </section>

    <section class="flex flex-col md:flex-row gap-4 mb-5">
        <!-- CHANGE PASSWORD -->
        <div class="bg-white p-8 rounded-lg shadow-md w-full">
            <h3 class="text-3xl text-center font-bold">{{ __('Change Password') }}</h3>

            <p class="mb-3 text-center text-sm text-gray-600">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>

            @include('forms.change-password')
        </div>

        <!-- JOB LISTINGS -->
        <div class="bg-white p-8 rounded-lg shadow-md w-full">
            <h3 class="text-3xl text-center font-bold mb-4">{{ __('My Jobs Listings') }}</h3>

            @forelse ($works as $work)
                <div
                    class="flex justify-between items-center border-b-2 transition-all hover:bg-gray-100 border-gray-200 p-2">
                    <div>
                        <a href="{{ route('jobs.show', $work->slug) }}"
                            class="transition-all text-xl font-semibold hover:text-blue-600">{{ $work->title }}</a>
                        <x-partials.job-type :work="$work->job_type" />
                    </div>

                    <div class="flex space-x-3 ml-4">
                        <x-partials.edit-delete-button :work="$work" :dashboard="true" />
                    </div>
                </div>

                <!-- Applicants Section -->
                <div class="mt-2 mb-4">
                    <h4 class="text-md text-gray-500 font-semibold mb-2">
                        {{ __('Applicants') }}
                    </h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        @forelse ($work->applicants as $applicant)
                            <div class="mb-4 p-4 bg-white border border-blue-600 rounded-lg max-w-full overflow-hidden">
                                <p class="text-sm text-gray-500 truncate">
                                    <strong>{{ __('Full Name') }}</strong>:&nbsp;
                                    <span class="block mb-2 text-blue-800">{{ $applicant->full_name }}</span>
                                </p>

                                <p class="text-sm text-gray-500 truncate">
                                    <strong>{{ __('Contact Email') }}</strong>:&nbsp;
                                    <span class="block mb-2 text-blue-800">{{ $applicant->contact_email }}</span>
                                </p>

                                <p class="text-sm text-gray-500 truncate">
                                    <strong>{{ __('Contact Phone') }}</strong>:&nbsp;
                                    <span class="block mb-2 text-blue-800">{{ $applicant->contact_phone }}</span>
                                </p>

                                <p class="text-sm text-gray-500 truncate">
                                    <strong>{{ __('Message') }}</strong>:&nbsp;
                                    <span class="block mb-2 text-blue-800">{{ $applicant->message }}</span>
                                </p>

                                <!-- Applicant Button -->
                                <x-modal-applicant-show :applicant="$applicant" />

                                <!-- Download and Delete Buttons -->
                                <div class="flex justify-between items-center mt-1">
                                    <a href="{{ asset($applicant->resume_path) }}" download
                                        title="{{ __('Download Resume') }}"
                                        class="flex-1 flex items-center justify-center p-2 rounded-md bg-gray-400 text-gray-100 hover:bg-purple-500 hover:text-white transition-all mr-2">
                                        <i class="fa-solid fa-download"></i>
                                    </a>

                                    <form id="delete-form-{{ $applicant->id }}"
                                        action="{{ route('job.applicant.destroy', $applicant->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            title="{{ __('Delete Applicant') }}&nbsp;{{ $applicant->contact_email }}"
                                            class="delete-item flex-1 flex items-center justify-center p-2 rounded-md bg-rose-600 text-white hover:bg-rose-700 transition-all">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-gray-400">
                                {{ __('No applicants for this job') }}
                            </p>
                        @endforelse
                    </div>
                </div>
            @empty
                <p class="text-xl text-center text-gray-500 font-semibold">{{ __('You have not job listing') }}</p>
            @endforelse

            <div class="mt-8">
                {{ $works->links() }}
            </div>
        </div>
    </section>

    <x-bottom-banner />
</x-layouts.master>

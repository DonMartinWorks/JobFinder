@props(['work'])

<div x-data="{ open: false }" class="p-5">
    <button @click="open = true"
        class="block w-full text-center transition-all px-5 py-2.5 shadow-sm rounded border text-base font-medium cursor-pointer text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
        {{ __('Apply Now') }}
    </button>

    <div x-cloak x-show="open" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
        <div @click.away="open = false" class="bg-white transition-all p-6 rounded-lg shadow-md w-full max-w-md relative">
            <button @click="open = false" class="absolute transition-all top-4 right-4 text-gray-600 hover:text-gray-900">
                <i class="fas fa-times"></i>
            </button>
            <h3 class="text-lg font-semibold mb-4">
                {{ __('Apply For') }}: {{ $work->title }}
            </h3>

            <form action="{{ route('job.applicant.store', $work->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Full Name -->
                <x-inputs.text id="full_name" name="full_name" label="{{ __('Full Name') }}"
                    placeholder="{{ __('Matt Damon') }}" :required="true" />

                <!-- Contact Phone -->
                <x-inputs.text id="contact_phone" name="contact_phone" label="{{ __('Contact Phone') }}"
                    placeholder="{{ __('+15817283165') }}" :required="true" />

                <!-- Contact Email -->
                <x-inputs.text id="contact_email" name="contact_email" label="{{ __('Contact Email') }}"
                    placeholder="{{ __('matt@damon.com') }}" :required="true" />

                <!-- Message -->
                <x-inputs.text-area id="message" name="message" cols="10" rows="2"
                    label="{{ __('Message') }}" :required="true" />

                <!-- Contact Phone -->
                <x-inputs.text id="location" name="location" label="{{ __('Location') }}"
                    placeholder="{{ __('Gotham City') }}" :required="true" />

                <!-- Contact Phone -->
                <x-inputs.file id="resume_path" name="resume_path" label="{{ __('Resume') }}: {{ __('Only PDF files') }}"
                    placeholder="{{ __('Only PDF files') }}" :required="true" />

                <div class="flow-foot p-6">
                    <button type="button" @click="open = false"
                        class="float-start justify-start bg-gray-400 transition-all hover:bg-gray-600 text-white px-4 py-2 rounded-md">
                        {{ __('Cancel') }}
                    </button>

                    <button type="submit"
                        class="float-end justify-end bg-teal-500 transition-all hover:bg-teal-600 text-white px-4 py-2 rounded-md">
                        {{ __('Apply') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

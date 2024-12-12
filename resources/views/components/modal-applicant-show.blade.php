@props(['applicant'])

<div x-data="{ open: false }">
    <div class="flex justify-between items-center mt-3">
        <button @click="open = true"
            class="flex-1 flex items-center justify-center p-2 rounded-md bg-orange-500 text-white hover:text-black hover:bg-orange-600 transition-all mb-2">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </div>

    <div x-cloak x-show="open" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
        <div @click.away="open = false" class="bg-white transition-all p-6 rounded-lg shadow-md w-full max-w-md relative">
            <button @click="open = false"
                class="absolute transition-all top-4 right-4 text-gray-600 hover:text-gray-900">
                <i class="fas fa-times"></i>
            </button>

            <h3 class="text-lg font-semibold mb-4">
                {{ __('Apply For') }}&#58;&nbsp;{{ $applicant->work->title }}
            </h3>

            <div>
                <div class="px-4 sm:px-0">
                    <h3 class="text-base/7 font-semibold text-gray-900">{{ __('Applicant Information') }}</h3>
                    <p class="mt-1 max-w-2xl text-sm/6 text-gray-500">{{ __('Personal details and application.') }}</p>
                </div>

                <div class="mt-6 border-t border-gray-100">
                    <dl class="divide-y divide-gray-100">
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt dt class="text-sm/6 font-medium text-gray-900">{{ __('Full Name') }}</dt>
                            <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                                {{ $applicant->full_name }}
                            </dd>
                        </div>

                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm/6 font-medium text-gray-900">{{ __('Contact Phone') }}</dt>
                            <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                                {{ $applicant->contact_phone }}
                            </dd>
                        </div>

                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm/6 font-medium text-gray-900">{{ __('Contact Email') }}</dt>
                            <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                                {{ $applicant->contact_email }}
                            </dd>
                        </div>

                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm/6 font-medium text-gray-900">{{ __('Message') }}</dt>
                            <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                                {{ $applicant->message }}
                            </dd>
                        </div>

                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm/6 font-medium text-gray-900">{{ __('Location') }}</dt>
                            <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                                {{ $applicant->location }}
                            </dd>
                        </div>

                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm/6 font-medium text-gray-900">{{ __('Resume') }}</dt>
                            <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                                    <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm/6">
                                        <div class="flex w-0 flex-1 items-center">
                                            <i class="size-5 shrink-0 text-gray-400 fa-solid fa-paperclip"></i>
                                            <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                                <span class="truncate font-medium">{{ $applicant->resume_path }}</span>
                                            </div>
                                        </div>

                                        <div class="ml-4 shrink-0">
                                            <a href="{{ asset($applicant->resume_path) }}" download
                                                class="font-medium text-indigo-600 hover:text-indigo-500 transition-all">{{ __('Download') }}</a>
                                        </div>
                                    </li>
                                </ul>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>

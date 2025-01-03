<x-layouts.master>
    <x-slot name="title">
        {{ __('Create Job') }}
    </x-slot>

    <div class="container mx-auto">
        <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
            <form method="POST" action="{{ route('job.create.store') }}" enctype="multipart/form-data">
                @csrf
                <h2 class="text-4xl capitalize text-center font-bold mb-2">{{ __('Create job listing') }}</h2>

                <h2 class="text-2xl capitalize font-bold mb-6 text-center text-gray-500">{{ __('Job info') }}</h2>

                <!-- Job Section -->
                @include('forms.job')
                <!-- Job Section -->

                <!-- ================================================================================================= -->

                <!-- Company Section -->
                <div class="mt-5">
                    @include('forms.company')
                </div>
                <!-- Company Section -->

                <x-submit-button />
            </form>
        </div>
    </div>
</x-layouts.master>

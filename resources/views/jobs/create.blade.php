<x-layouts.master>
    <x-slot name="title">
        {{ __('Create Job') }}
    </x-slot>

    <div class="container mx-auto">
        <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
            <form method="POST" action="{{ route('jobs.create.store') }}" enctype="multipart/form-data">
                @csrf
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

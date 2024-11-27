<x-layouts.master>
    <x-slot name="title">
        {{ __('Create Job') }}
    </x-slot>

    <div class="container mx-auto">
        <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
            <h2 class="text-4xl capitalize text-center font-bold mb-4">{{ __('Create job listing') }}</h2>
            {{-- <form method="POST" action="{{ route('jobs.store') }}" enctype="multipart/form-data">
                @csrf --}}
            <form method="POST" action="#">

                <!-- Job Section -->
                <div>
                    <h2 class="text-2xl capitalize font-bold mb-6 text-center text-gray-500">{{ __('Job info') }}</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Job Title -->
                        <x-inputs.text id="title" name="title" label="{{ __('Job Title') }}"
                            placeholder="{{ __('Frontend Developer') }}" :required="true" />

                        <!-- Annual Salary -->
                        <x-inputs.text id="salary" name="salary" type="number" label="{{ __('Annual Salary') }}"
                            :min="0" placeholder="90000" :required="true" />
                    </div>

                    <!-- Job Description -->
                    <x-inputs.text-area id="description" name="description" label="{{ __('Job Description') }}"
                        cols="10" rows="10"
                        placeholder="{{ __('We are seeking a skilled and motivated Software Developer to join our growing development team...') }}"
                        :required="true" />

                    <!-- Requirements -->
                    <x-inputs.text-area id="requirements" name="requirements" label="{{ __('Requirements') }}"
                        cols="20" rows="4"
                        placeholder="{{ __('Bachelor is degree in Computer Science') }}" />

                    <!-- Benefits -->
                    <x-inputs.text-area id="benefits" name="benefits" label="{{ __('Benefits') }}" cols="20"
                        rows="4"
                        placeholder="{{ __('Competitive salary, health benefits, 401(k), and more') }}" />

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Tags (comma-separated) -->
                        <x-inputs.text id="tags" name="tags" label="{{ __('Tags (comma-separated)') }}"
                            placeholder="{{ __('development,coding,java,python') }}" />

                        <!-- Job Type -->
                        <x-inputs.select id="job_type" name="job_type" label="{{ __('Job Type') }}"
                            value="{{ old('job_type') }}" :options="[
                                'FullTime' => __('Full Time'),
                                'PartTime' => __('Part Time'),
                                'Contract' => __('Contract'),
                                'Temporary' => __('Temporary'),
                                'Internship' => __('Internship'),
                                'Volunteer' => __('Volunteer'),
                                'OnCall' => __('On Call'),
                            ]" :required="true" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Remote -->
                        <x-inputs.select id="remote" name="remote" label="{{ __('Remote') }}" :options="[
                            0 => __('No'),
                            1 => __('Yes'),
                        ]"
                            :required="true" />

                        <!-- Address -->
                        <x-inputs.text id="address" name="address" label="{{ __('Address') }}"
                            placeholder="{{ __('123 Main St') }}" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- City -->
                        <x-inputs.text id="city" name="city" label="{{ __('City') }}"
                            placeholder="{{ __('Albany') }}" />

                        <!-- State -->
                        <x-inputs.text id="state" name="state" label="{{ __('State') }}"
                            placeholder="{{ __('NY') }}" />
                    </div>

                    <!-- ZIP Code -->
                    <x-inputs.text id="zipcode" name="zipcode" label="{{ __('ZIP Code') }}"
                        placeholder="{{ __('12201') }}" />
                </div>
                <!-- Job Section -->

            <!-- ================================================================================================= -->

                <!-- Company Section -->
                <div>
                    <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">{{ __('Company Info') }}</h2>

                    <!-- Company Name -->
                    <x-inputs.text id="company_name" name="company_name" label="{{ __('Company Name') }}"
                        placeholder="{{ __('Shields LLC') }}" />

                    <!-- Company Description -->
                    <x-inputs.text-area id="company_description" name="company_description"
                        label="{{ __('Company Description') }}" cols="20" rows="4"
                        placeholder="{{ __('We are a company how did the...') }}" />

                    <!-- Company Website -->
                    <x-inputs.text id="company_website" type="url" name="company_website"
                        label="{{ __('Company Website') }}" placeholder="{{ __('www.company-cool.com') }}" />

                    <!-- Contact Phone -->
                    <x-inputs.text id="contact_phone" name="contact_phone" label="{{ __('Contact Phone') }}"
                        placeholder="{{ __('+1 (757) 763-1233') }}" :required="true" />

                    <!-- Contact Email -->
                    <x-inputs.text id="contact_email" name="contact_email" type="email"
                        label="{{ __('Contact Email') }}" placeholder="{{ __('tressie.stehr@romaguera.com') }}"
                        :required="true" />

                    <!--Company Logo -->
                    <x-inputs.file id="company_logo" name="company_logo" label="{{ __('Company Logo') }}"
                        :required="false" />

                    <div class="lg:mx-1">
                        <button type="submit"
                            class="w-full bg-green-500 hover:bg-green-600 transition-all text-white px-4 py-2 my-3 rounded-md focus:outline-none">
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
                <!-- Company Section -->
            </form>
        </div>
    </div>
</x-layouts.master>

<div class="w-full">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Job Title -->
        <x-inputs.text id="title" name="title" label="{{ __('Job Title') }}"
            placeholder="{{ __('Frontend Developer') }}" value="{{ @$work->title ? $work->title : '' }}"
            :required="true" />

        <!-- Annual Salary -->
        <x-inputs.text id="salary" name="salary" type="number" label="{{ __('Annual Salary') }}" :min="0"
            value="{{ @$work->salary ? $work->salary : '' }}" placeholder="90000" :required="true" />
    </div>

    <!-- Job Description -->
    <x-inputs.text-area id="description" name="description" label="{{ __('Job Description') }}" cols="10"
        value="{{ @$work->description ? $work->description : '' }}" rows="10"
        placeholder="{{ __('We are seeking a skilled and motivated Software Developer to join our growing development team...') }}"
        :required="true" />

    <!-- Requirements -->
    <x-inputs.text-area id="requirements" name="requirements" label="{{ __('Requirements') }}" cols="20"
        value="{{ @$work->requirements ? $work->requirements : '' }}" rows="4"
        placeholder="{{ __('Bachelor is degree in Computer Science') }}" />

    <!-- Benefits -->
    <x-inputs.text-area id="benefits" name="benefits" label="{{ __('Benefits') }}" cols="20" rows="4"
        value="{{ @$work->benefits ? $work->benefits : '' }}"
        placeholder="{{ __('Competitive salary, health benefits, 401(k), and more') }}" />

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Tags (comma-separated) -->
        <x-inputs.text id="tags" name="tags" label="{{ __('Tags (comma-separated)') }}"
            value="{{ @$work->tags ? $work->tags : '' }}" placeholder="{{ __('development,coding,java,python') }}" />

        <!-- Job Type -->
        <x-inputs.select id="job_type" name="job_type" label="{{ __('Job Type') }}"
            value="{{ old('job_type', @$work->job_type ? $work->job_type : '') }}" :options="[
                'FullTime' => __('Full Time'),
                'PartTime' => __('Part Time'),
                'Contract' => __('Contract'),
                'Temporary' => __('Temporary'),
                'Internship' => __('Internship'),
                'Volunteer' => __('Volunteer'),
                'OnCall' => __('On Call'),
            ]"
            :required="true" />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Remote -->
        <x-inputs.select id="remote" name="remote" label="{{ __('Remote') }}"
            value="{{ old('remote', @$work->remote ? 1 : 0) }}" :options="[
                0 => __('No'),
                1 => __('Yes'),
            ]" :required="true" />

        <!-- Address -->
        <x-inputs.text id="address" name="address" label="{{ __('Address') }}"
            value="{{ @$work->address ? $work->address : '' }}" placeholder="{{ __('123 Main St') }}" />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- City -->
        <x-inputs.text id="city" name="city" label="{{ __('City') }}"
            value="{{ @$work->city ? $work->city : '' }}" placeholder="{{ __('Albany') }}" />

        <!-- State -->
        <x-inputs.text id="state" name="state" label="{{ __('State') }}"
            value="{{ @$work->state ? $work->state : '' }}" placeholder="{{ __('NY') }}" />
    </div>

    <!-- ZIP Code -->
    <x-inputs.text id="zipcode" name="zipcode" label="{{ __('ZIP Code') }}"
        value="{{ @$work->zipcode ? $work->zipcode : '' }}" placeholder="{{ __('12201') }}" />
</div>

<div>
    <h2 class="text-2xl font-bold mb-2 text-center text-gray-500">{{ __('Company Info') }}</h2>

    <h2 class="text-md capitalize font-normal mb-6 text-center text-gray-400">{{ __('Please fill this form') }}</h2>

    <!-- Company Name -->
    <x-inputs.text id="company_name" name="company_name" label="{{ __('Company Name') }}"
        placeholder="{{ __('Shields LLC') }}" />

    <!-- Company Description -->
    <x-inputs.text-area id="company_description" name="company_description" label="{{ __('Company Description') }}"
        cols="20" rows="4" placeholder="{{ __('We are a company how did the...') }}" />

    <!-- Company Website -->
    <x-inputs.text id="company_website" type="url" name="company_website" label="{{ __('Company Website') }}"
        placeholder="{{ __('www.company-cool.com') }}" />

    <!-- Contact Phone -->
    <x-inputs.text id="contact_phone" name="contact_phone" label="{{ __('Contact Phone') }}"
        placeholder="{{ __('+1 (757) 763-1233') }}" :required="true" />

    <!-- Contact Email -->
    <x-inputs.text id="contact_email" name="contact_email" type="email" label="{{ __('Contact Email') }}"
        placeholder="{{ __('tressie.stehr@romaguera.com') }}" :required="true" />

    <!--Company Logo -->
    <x-inputs.file id="company_logo" name="company_logo" label="{{ __('Company Logo') }}" :required="false" />

    <!-- Status -->
    <div class="grid gap-4">
        <!-- Componente de Checkbox -->
        <div class="grid gap-4">
            <x-inputs.checkbox id="status" name="status" label="{{ __('Status') }}" :checked="old('status', false)"
                class="block my-4"
                class2="w-full md:block mb-2 transition-all text-gray-700 text-md focus:text-yellow-500 focus:font-semibold hover:text-yellow-500 flex items-center"
                class3="p-2 mr-1 rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-600"
                class4="text-gray-600 border-gray-300 rounded focus:ring-yellow-500 focus:ring-2" />
        </div>

    </div>
</div>

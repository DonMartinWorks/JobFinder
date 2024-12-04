@props(['work' => ''])

@php
    use App\Enums\JobType;
@endphp

<div class="text-xs font-bold">
    @if ($work == JobType::FullTime->value)
        <span class="text-rose-500">{{ __('Full Time') }}</span>
    @endif

    @if ($work == JobType::PartTime->value)
        <span class="text-purple-500">{{ __('Part Time') }}</span>
    @endif

    @if ($work == JobType::Contract->value)
        <span class="text-green-500">{{ __('Contract') }}</span>
    @endif

    @if ($work == JobType::Temporary->value)
        <span class="text-yellow-500">{{ __('Temporary') }}</span>
    @endif

    @if ($work == JobType::Internship->value)
        <span class="text-gray-500">{{ __('Internship') }}</span>
    @endif

    @if ($work == JobType::Volunteer->value)
        <span class="text-blue-500">{{ __('Volunteer') }}</span>
    @endif

    @if ($work == JobType::OnCall->value)
        <span class="text-orange-500">{{ __('On Call') }}</span>
    @endif
</div>

@if (session('success'))
    <x-alert type="success" message="{{ session('success') }}" timeout="4000" />
@endif

@if (session('warning'))
    <x-alert type="warning" message="{{ session('warning') }}" timeout="4000" />
@endif

@if (session('error'))
    <x-alert type="error" message="{{ session('error') }}" timeout="8000" />
@endif

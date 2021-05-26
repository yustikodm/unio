@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => "#"])
            UNIO
        @endcomponent
    @endslot

{{-- Body --}}
    <h1>Email Verification</h1>
    <img src="{{ $logo }}" />
    <a class="btn btn-primary" href="{{ $action }}">
        Verify Email Address
    </a>

{{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

{{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. Super FOOTER!
        @endcomponent
    @endslot
@endcomponent
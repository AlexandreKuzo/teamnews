@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            La dépêche d'A1
        @endcomponent
    @endslot

    {{-- Body --}}
    Voici un lien de réinitialisation de votre mot de passe. Celui-ci est valide pendant une heure.<br>
    {{ $slot }}

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
            © {{ date('Y') }} La dépêche d'A1. @lang('All rights reserved.')
        @endcomponent
    @endslot
@endcomponent

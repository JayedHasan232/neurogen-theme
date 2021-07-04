@component('mail::message')
# {{ $name }}
# {{ $phone }}
# {{ $email }}

@component('mail::panel')
{{ $message }}
@endcomponent

Thanks,<br>
{{ $name }}
@endcomponent

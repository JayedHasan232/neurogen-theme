@component('mail::message')
# {{ $name }}
# {{ $phone }}
# {{ $email }}
# {{ $date }}

@component('mail::panel')
{{ $message }}
@endcomponent

Thanks,<br>
{{ $name }}
@endcomponent

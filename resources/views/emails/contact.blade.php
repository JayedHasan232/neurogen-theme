@component('mail::message')
# {{ $name }}
# {{ $phone }}
# {{ $email }}

{{ $message }}

Thanks,<br>
{{ $name }}
@endcomponent

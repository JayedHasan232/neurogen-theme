@component('mail::message')
# Name: {{ $name }}
# Phone: {{ $phone }}
# Email: {{ $email }}
# Delivery Address: {{ $address }}
# Payment Method: {{ $payment_method }}
# Registered Patient: {{ $registered_patient }}
# Reference: {{ $reference }}
# Employee Name: {{ $employee_name }}
# Employee ID: {{ $employee_id }}
# Remark: {{ $remark }}

@component('mail::table')
| Item Name      | Quantiny         | Unit  |
| ------------- |:-------------:| --------:|
@foreach($medicines as $medicine)
| {{$medicine['name']}}     | {{$medicine['quantity']}} |        {{$medicine['unit']}} |
@endforeach
@endcomponent

Thanks,<br>
{{ $name }}
@endcomponent

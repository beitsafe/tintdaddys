@component('mail::message')
# Hi

Here is your new enquiry:

Name: {{$enquiry->name}}\
Email: {{$enquiry->email}}\
Message: {{$enquiry->message}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent

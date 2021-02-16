@component('mail::message')
# Hi

A new user application has been received.

Name: {{@$user->clients->firstName}} {{@$user->clients->lastName}}\
Email: {{@$user->email}}\
Business: {{@$user->clients->businessName}}

@component('mail::button', ['url' => '/admin/users'])
    Approve/Reject Application
@endcomponent

Use the above link to manage new application

Thanks,<br>
{{ config('app.name') }}
@endcomponent

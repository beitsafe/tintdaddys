@component('mail::message')
# Hi {{@$user->clients->firstName}} {{@$user->clients->lastName}}

Your account application has been approved. Use the below button to login to your account.

@component('mail::button', ['url' => env('APP_URL_LOGIN')])
    Login
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent

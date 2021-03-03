@component('mail::message')
# Hi

You Have Received A New Warranty Application.

@component('mail::button', ['url' => env('APP_URL').'/admin/warranties/'.@$warranty->id.'/edit'])
    View Warranty
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

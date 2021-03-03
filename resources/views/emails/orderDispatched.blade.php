@component('mail::message')
# Hi {{@$order->user->client->firstName}}

Your Order, {{@$order->invoiceno}}, Has Been Dispatched.

Details

Thanks,<br>
{{ config('app.name') }}
@endcomponent

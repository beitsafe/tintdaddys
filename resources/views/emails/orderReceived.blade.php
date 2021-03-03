@component('mail::message')
# Hi

A New Order Has Been Received

Name: {{@$order->invoiceno}}\
Email: {{@$order->subtotal}}\

@component('mail::button', ['url' => env('APP_URL').'/admin/orders/'.@$order->id.'/edit'])
    View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

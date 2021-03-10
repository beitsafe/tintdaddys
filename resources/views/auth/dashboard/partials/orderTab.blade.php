<h2>Order Details</h2>
<div class="boxed boxed--border bg--secondary">
    <table class="table text-white">
        <thead>
        <tr>
            <th scope="col">Date</th>
            <th scope="col">Total</th>
            <th scope="col">Status</th>
            <th scope="col">Details</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->created_at->format('jS \\of F Y')}}</td>
                <td>{{$order->subtotal}}</td>
                @if ($order->dispatched == 1)
                    <td>Dispatched</td>
                @else
                    <td>Awaiting Dispatch</td>
                @endif
                <td>@include('auth.dashboard.partials.orderModal')</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

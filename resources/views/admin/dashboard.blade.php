@extends('layouts.app')

@section('content')

    <div class="card bg-dark mt-5">
        <div class="card-body">
            <img src="{{asset('frontend/branding/ozwindowadmin.png')}}" class="img-fluid" alt="Responsive image">
        </div>
    </div>

    <div class="row mt-5">
        <div class="col text-center">
            <h2>Orders to be dispatched</h2>
        </div>
    </div>

    <div class="row">
        @foreach ($orders as $order)
            <div class="col-4">
                <div class="card bg-dark mt-5">
                    <div class="card-body text-white">
                        <div class="row">
                            <div class="col">
                                <h3>{{$order->invoiceno}}</h3>
                            </div>
                            <div class="col text-right">
                                <p>${{$order->subtotal}}</p>
                            </div>
                        </div>
                        <p>{{$order->user->client->name}} | {{$order->user->client->businessName}}</p>

                        <p>{{$order->created_at->format('jS \\of F Y')}}</p>
                        <div class="row">
                            <div class="col text-right">
                                {{ Form::open(['route' => 'admin.order.dispatch', 'class' => 'form-horizontal','id'=>'cart-form']) }}
                                {{ Form::hidden('order_id',$order->id)}}
                                <button type="submit"
                                        name="dispatch"
                                        value="1"
                                        class="btn btn-secondary "
                                        id="#dispatch-order"
                                        title="Dispatch Order">
                                    Dispatch
                                </button>
                                {{ Form::close()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@stop

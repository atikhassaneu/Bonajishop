@extends('layouts.admin')
@section('title', 'Order')
@push('css') @endpush

@section('title-btn')
    <a href="{{route('admin.order.index')}}" class="btn btn-info">Back To Order</a>
@endsection


@section('content')

    <div class="card mb-3">
        <div class="card-header">
            <i class="fab fa-fw fa-sellsy"></i> Order Details
        </div>
        <div class="card-body">
            @include('admin.message.msg')
            <div class="table-responsive">

                @if($order)
                <table class="table table-bordered text-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="45%">Product Name</th>
                                <th width="15%">Unit Price</th>
                                <th width="5%">Quantity</th>
                                <th width="10%">Price</th>
                            </tr>
                        </thead>
                        <tbody>

                                   @foreach($order->orderDetails as $orderItemDetail)
                                       <tr>
                                           @php
                                               $price = $orderItemDetail->product->discounted_price == 0? $orderItemDetail->product->price : $orderItemDetail->product->discounted_price;
                                                $quantity = $orderItemDetail->quantity;
                                           @endphp
                                           <td>{{ $orderItemDetail->product->title }}</td>
                                           <td>{{ $price }}</td>
                                           <td>{{ $quantity }}</td>
                                           <td>{{ $price * $quantity }}</td>
                                       </tr>
                                   @endforeach



                        </tbody>
                </table>
                <div class="col-md-3 ml-auto" style="padding-left: 0px; padding-right: 0px;">
                    <div class="card">
                        <div class="card-header" style="background: #fff">
                            Totals
                        </div>
                        <div class="card-body" style="padding: 0px">
                            <table class="table">
                                <tr>
                                    <td width="68%">subtotal</td>
                                    <td>{{ $order->total_price - $order->delivery_charge }}</td>
                                </tr>
                                <tr>
                                    <td>Delivery Charge</td>
                                    <td>{{ $order->delivery_charge }}</td>
                                </tr>
                                <tr>
                                    <td><b>Total</b></td>
                                    <td><b>{{ $order->total_price }}</b></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('admin.order.update', $order->id) }}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="input-group">
                            <select name="status" class="form-control">
                                <option {{ $order->order_status == 'pending'? "selected" : '' }} value="1"> pending</option>
                                <option {{ $order->order_status == 'process'? "selected" : '' }} value="2"> process</option>
                                <option {{ $order->order_status == 'delivery'? "selected" : '' }} value="3"> delivery</option>
                                <option {{ $order->order_status == 'completed'? "selected" : '' }} value="4"> completed</option>
                            </select>
                            <input type="submit" value="Submit" class="form-control btn btn-info">
                        </div>

                    </form>
                </div>
                @else
                    {{ "Order not available" }}
                @endif
            </div>

        </div>
        <div class="card-footer small text-muted"></div>
    </div>


@endsection



@push('js') @endpush

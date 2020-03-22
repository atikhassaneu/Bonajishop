@extends('layouts.admin')
@section('title', 'Order')
@push('css') @endpush

@section('title-btn')
    <a href="{{route('admin.order.index')}}" class="btn btn-info">Back To Order</a>
    <a  target="_blank" href="{{route('admin.order.invoice', $order->id)}}" class="btn btn-dark ml-2">Generate Invoice</a>
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
                                   @php $subtotal = 0  @endphp
                                   @foreach($order->orderDetails as $orderItemDetail)
                                       @php $subtotal = $subtotal + $orderItemDetail->product->price * $orderItemDetail->quantity @endphp
                                       <tr>
                                           <td>{{ $orderItemDetail->product->title }}</td>
                                           <td>{{ $orderItemDetail->product->price }}</td>
                                           <td>{{ $orderItemDetail->quantity  }}</td>
                                           <td>{{ $orderItemDetail->product->price * $orderItemDetail->quantity }}</td>
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
                                    <td>{{ $subtotal }}</td>
                                </tr>
                                <tr>
                                    <td>Discount</td>
                                    <td>{{ $subtotal - $order->total_price }}</td>
                                </tr>

                                <tr>
                                    <td>Delivery Charge</td>
                                    <td>{{ $order->delivery_charge }}</td>
                                </tr>
                                <tr>
                                    <td><b>Amount to pay</b></td>
                                    <td><b>{{ $order->total_price + $order->delivery_charge }}</b></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <h5 class="mb-3">Billing Information</h5>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="20%" class="pl-md-5">Name </td>
                            <td>{{ $order->name }}</td>
                        </tr>
                        <tr>
                            <td class="pl-md-5">Email </td>
                            <td>{{ $order->email }}</td>
                        </tr>
                        <tr>
                            <td class="pl-md-5">Phone </td>
                            <td>{{ $order->phone }}</td>
                        </tr>
                        <tr>
                            <td class="pl-md-5">Address </td>
                            <td>{{ $order->address }}</td>
                        </tr>
                        <tr>
                            <td class="pl-md-5">Post Code </td>
                            <td>{{ $order->post_code }}</td>
                        </tr>
                        <tr>
                            <td class="pl-md-5">City </td>
                            <td>{{ $order->city }}</td>
                        </tr>
                        <tr>
                            <td class="pl-md-5">Payment Method</td>
                            <td>{{ $order->payment_method }}</td>
                        </tr>
                        @if($order->bkash_verification_code)
                            <tr>
                                <td class="pl-md-5">Bkash Transaction ID </td>
                                <td>{{ $order->bkash_verification_code }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>












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

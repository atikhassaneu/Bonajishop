@extends('layouts.admin')
@section('title', 'Order')
@push('css') @endpush

@section('title-btn')
    <a href="{{route('admin.order.index')}}" class="btn btn-info">Order</a>
@endsection


@section('content')

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-fw fa-sliders-h"></i> All Orders
        </div>
        <div class="card-body">
            @include('admin.message.msg')

            <div class="table-responsive">
                <table class="table table-bordered text-center" width="100%" cellspacing="0">
                    @if(count($orders))
                        <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="45%">Name</th>
                            <th width="15%">Phone</th>
                            <th width="5%">Price(taka)</th>
                            <th width="10%">Status</th>
                            <th width="20%">Action</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach($orders as $key => $order )
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->total_price }}</td>
                                <td><span class="btn btn-primary btn-sm">{{ $order->order_status}}</span></td>
                                <td>
                                    <a class="btn btn-sm btn-success" href="{{route('admin.order.show',$order->id)}}"><i class="fas fa-eye"></i></a>
{{--                                    <a class="btn btn-sm btn-info" href="{{route('admin.order.edit',$order->id)}}"><i class="fas fa-pencil-alt"></i></a>--}}
                                    <a onclick="event.preventDefault(); document.getElementById('order-delete-id-{{ $order->id }}').submit();" class="btn btn-sm btn-danger" href="" ><i class="fas fa-trash-alt"></i></a>
                                    <form id="order-delete-id-{{ $order->id }}" class="d-none" action="{{ route('admin.order.destroy', $order->id) }}" method="post"> @csrf @method('DELETE') </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="6"> {{ $orders->links() }} </td>
                        </tr>
                        </tbody>
                    @else
                        {{"No order available !!"}}
                    @endif

                </table>
            </div>
        </div>
        <div class="card-footer small text-muted"> Last Updated Today at {{ \Carbon\Carbon::now()->format('h:m:s') }}</div>
    </div>


@endsection



@push('js') @endpush

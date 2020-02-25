@extends('layouts.admin')
@section('title', 'Dashboard')
@push('css') @endpush

@section('title-btn')
    <a href="{{route('admin.delivery.charge.index')}}" class="btn btn-primary">Delivery Charge</a>
@endsection




@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-fw fa-truck"></i> All Delivery Charge List
                </div>
                <div class="card-body">
                    @include('admin.message.msg')

                    <div class="table-responsive">
                        <table class="table table-bordered text-center" width="100%" cellspacing="0">
                            @if(count($delivery_charge_items))
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Shipping Area</th>
                                    <th>Charge(Taka)</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                    @foreach($delivery_charge_items as $key =>$item)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $item->area }}</td>
                                            <td>{{ $item->charge }}</td>
                                            <td>
                                                <a href="{{ route('admin.delivery.charge.edit', $item->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="" onclick="event.preventDefault(); document.getElementById('delivery-form-{{ $item->id }}').submit();" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                                <form id="delivery-form-{{ $item->id }}" action="{{ route('admin.delivery.charge.destroy', $item->id) }}" method="post">@csrf @method("DELETE")</form>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            @else
                                {{"No Delivery Charge available !!"}}
                            @endif

                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Last Updated Today at </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-fw fa-plus"></i> Add New Delivery Charge Area
                </div>
                <div class="card-body">
                    @include('admin.message.msg')
                    <form action="{{ route('admin.delivery.charge.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="shipping-area">Shipping Area <span style="color: red;">*</span></label>
                            <input id="shipping-area"  type="text" name="shipping_area" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="delivery-charge">Charge<span style="color: red;">*</span></label>
                            <input id="delivery-charge"  type="text" name="charge" class="form-control">
                        </div>

                        <input type="submit" name="submit" value="Add Delivery Charge Area" class="btn btn-primary">
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection



@push('js') @endpush

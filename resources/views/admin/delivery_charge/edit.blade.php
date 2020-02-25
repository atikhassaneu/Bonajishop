@extends('layouts.admin')
@section('title', 'Dashboard')
@push('css') @endpush

@section('title-btn')
    <a href="{{route('admin.delivery.charge.index')}}" class="btn btn-primary">Delivery Charge</a>
@endsection




@section('content')

    <div class="row">

        <div class="col-md-8 mx-auto">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-fw fa-plus"></i> Edit Delivery Charge Area
                </div>
                <div class="card-body">
                    @include('admin.message.msg')
                    <form action="{{ route('admin.delivery.charge.update', $delivery_charge_item->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="shipping-area">Shipping Area <span style="color: red;">*</span></label>
                            <input id="shipping-area" value="{{ $delivery_charge_item->area }}" type="text" name="shipping_area" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="delivery-charge">Charge<span style="color: red;">*</span></label>
                            <input id="delivery-charge" value="{{ $delivery_charge_item->charge }}"  type="text" name="charge" class="form-control">
                        </div>

                        <input type="submit" name="submit" value="Edit Delivery Charge Area" class="btn btn-primary">
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection



@push('js') @endpush

@extends('layouts.admin')
@section('title', 'Dashboard')
@push('css') @endpush

@section('title-btn')
    <a href="{{route('admin.product.index')}}" class="btn btn-info">Product</a>
@endsection

@section('add-btn')
        <a href="{{route('admin.product.create')}}" class="btn btn-primary">Add New Product</a>
@endsection


@section('content')

    <div class="card mb-3">
        <div class="card-header">
            <i class="fab fa-fw fa-product-hunt"></i> All Products
        </div>
        <div class="card-body">
            @include('admin.message.msg')

            <div class="table-responsive">
                <table class="table table-bordered text-center" width="100%" cellspacing="0">
                    @if(count($products))
                    <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="50%">Title</th>
                        <th width="10%">Stock</th>
                        <th width="10%">View</th>
                        <th width="5%">Status</th>
                        <th width="20%">Action</th>

                    </tr>
                    </thead>

                    <tbody>
                        @foreach($products as $key => $product  )
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{$product->title }}</td>
                                <td>{{$product->stock }}</td>
                                <td>{{$product->view }}</td>
                                <td>
                                    @if($product->status == 1)
                                        <span class="badge badge-success py-2 px-2">Published</span>
                                    @else
                                        <span class="badge badge-warning py-2 px-2">Unpublished</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-success" href="{{route('admin.product.show',$product->id)}}"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-sm btn-info" href="{{route('admin.product.edit',$product->id)}}"><i class="fas fa-pencil-alt"></i></a>
                                    <a onclick="event.preventDefault(); document.getElementById('product-delete-id-{{ $product->id }}').submit();" class="btn btn-sm btn-danger" href="{{route('admin.product.edit',$product->id)}}"><i class="fas fa-trash-alt"></i></a>
                                    <form id="product-delete-id-{{ $product->id }}" class="d-none" action="{{ route('admin.product.soft.delete', $product->id) }}" method="post"> @csrf @method('PUT') </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    @else
                        {{"No Product available !!"}}
                    @endif

                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Last Updated Today at </div>
    </div>


@endsection



@push('js') @endpush
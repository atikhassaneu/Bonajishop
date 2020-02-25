@extends('layouts.admin')
@section('title', 'Dashboard')
@push('css') @endpush

@section('title-btn')
    <a href="{{route('admin.trash.category')}}" class="btn btn-info">Trash Category</a>
@endsection

@section('add-btn')
{{--        <a href="{{route('admin.category.create')}}" class="btn btn-primary">Add New Category</a>--}}
@endsection


@section('content')

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-fw fa-list-alt"></i> All Deleted Categories
        </div>
        <div class="card-body">
            @include('admin.message.msg')

            <div class="table-responsive">
                <table class="table table-bordered text-center" width="100%" cellspacing="0">
                    @if(count($categories))
                    <thead>
                    <tr>
                        <th width="10%">#</th>
                        <th width="60%">Category</th>
                        <th width="10%">Status</th>
                        <th width="20%">Action</th>

                    </tr>
                    </thead>

                    <tbody>
                        @foreach($categories as $key => $category )
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{$category->category }}</td>

                                <td> <span class="badge badge-warning py-2 px-2">Deleted</span> </td>
                                <td>

                                    <a onclick="event.preventDefault(); document.getElementById('category-restore-id-{{ $category->id }}').submit();" class="btn btn-sm btn-info" href="#"><i class="fas fa-trash-restore-alt"></i></a>
                                    <form id="category-restore-id-{{ $category->id }}" class="d-none" action="{{ route('admin.trash.category.restore', $category->id) }}" method="post"> @csrf @method('PUT') </form>

                                    <a onclick="event.preventDefault(); document.getElementById('category-delete-id-{{ $category->id }}').submit();" class="btn btn-sm btn-danger" href="#"><i class="fas fa-trash-alt"></i></a>
                                    <form id="category-delete-id-{{ $category->id }}" class="d-none" action="{{ route('admin.trash.category.destroy', $category->id) }}" method="post"> @csrf @method('DELETE') </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    @else
                        {{"No category available !!"}}
                    @endif

                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Last Updated Today at </div>
    </div>


@endsection



@push('js') @endpush
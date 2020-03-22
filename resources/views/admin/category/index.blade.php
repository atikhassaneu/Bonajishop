@extends('layouts.admin')
@section('title', 'Dashboard')
@push('css') @endpush

@section('title-btn')
    <a href="{{route('admin.category.index')}}" class="btn btn-info">Category</a>
@endsection

@section('add-btn')
        <a href="{{route('admin.category.create')}}" class="btn btn-primary">Add New Category</a>
@endsection


@section('content')

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-fw fa-list-alt"></i> All Categories
        </div>
        <div class="card-body">
            @include('admin.message.msg')

            <div class="table-responsive">
                <table class="table table-bordered text-center" width="100%" cellspacing="0">
                    @if(count($categories))
                    <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="35%">Category</th>
                        <th width="35%">Parent Category</th>
                        <th width="5%">Status</th>
                        <th width="20%">Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($categories as $key => $category )
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{$category->category }}</td>
                                <td>{{ $category->parent_id != 0 ? $category->parent->category : '' }}</td>

                                <td>
                                    @if($category->status == 1)
                                        <span class="badge badge-success py-2 px-2">Published</span>
                                    @else
                                        <span class="badge badge-warning py-2 px-2">Unpublished</span>
                                    @endif
                                </td>
                                <td>
{{--                                    <a class="btn btn-sm btn-success" href="{{route('admin.category.show',$category->id)}}"><i class="fas fa-eye"></i></a>--}}
                                    <a class="btn btn-sm btn-info" href="{{route('admin.category.edit',$category->id)}}"><i class="fas fa-pencil-alt"></i></a>
                                    <a onclick="event.preventDefault(); document.getElementById('category-delete-id-{{ $category->id }}').submit();" class="btn btn-sm btn-danger" href="#"><i class="fas fa-trash-alt"></i></a>
                                    <form id="category-delete-id-{{ $category->id }}" class="d-none" action="{{ route('admin.category.soft.delete', $category->id) }}" method="post"> @csrf @method('PUT') </form>

                                </td>
                            </tr>
                        @endforeach
                    <tr>
                        <td colspan="5">{{ $categories->links() }}</td>
                    </tr>

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

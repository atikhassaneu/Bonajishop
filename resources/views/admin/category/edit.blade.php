@extends('layouts.admin')
@section('title', 'Dashboard')
@push('css') @endpush

@section('title-btn')
    <a href="{{route('admin.category.index')}}" class="btn btn-info">Back To Category</a>
@endsection

@section('add-btn')
    {{--        <a href="{{route('admin.slider.create')}}" class="btn btn-primary">Add New Slider</a>--}}
@endsection


@section('content')

    <div class="card mb-3 mx-lg-5">
        <div class="card-header">
            <i class="fas fa-fw fa-list-alt"></i> Create A New Category
        </div>
        <div class="card-body">
            @include('admin.message.msg')
            <form action="{{ route('admin.category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="form-group">
                    <label for="categoryName">Category Name *</label>
                    <textarea name="categoryName" id="categoryName" rows="4" class="form-control @error('categoryName') is-invalid @enderror">{{ $category->category }}</textarea>
                    @error('categoryName')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="parentCategory">Select Parent Category *</label>
                    <select class="form-control" id="parentCategory" name="parentCategory">
                        <option value="0">Make Parent Category</option>
                        @foreach($parent_categories as $parent_category)
                            <option @if(\App\Category::find($category->id)->parentCategory != null && \App\Category::find($category->id)->parentCategory->id == $parent_category->id) {{ "selected" }} @endif value="{{ $parent_category->id }}">{{ $parent_category->category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Status *</label>
                    <select class="form-control" id="status" name="status">
                        <option @if($category->status == 0)  {{"selected"}}  @endif value="0">Unpublished</option>
                        <option @if($category->status == 1)  {{"selected"}}  @endif value="1">Published</option>
                    </select>
                </div>

                <input type="submit" class="btn btn-primary btn-block px-3" value="Submit">


            </form>
        </div>

    </div>


@endsection



@push('js') @endpush
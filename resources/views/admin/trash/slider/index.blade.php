@extends('layouts.admin')
@section('title', 'Dashboard')
@push('css') @endpush

@section('title-btn')
    <a href="{{route('admin.trash.slider')}}" class="btn btn-info">Trash Slider</a>
@endsection

@section('add-btn')
{{--        <a href="{{route('admin.slider.create')}}" class="btn btn-primary">Add New Slider</a>--}}
@endsection


@section('content')

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-fw fa-sliders-h"></i> All Sliders
        </div>
        <div class="card-body">
            @include('admin.message.msg')

            <div class="table-responsive">
                <table class="table table-bordered text-center" width="100%" cellspacing="0">
                    @if(count($sliders))
                    <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="55%">Title</th>
                        <th width="15%">Image</th>
                        <th width="5%">Status</th>
                        <th width="20%">Action</th>

                    </tr>
                    </thead>

                    <tbody>
                        @foreach($sliders as $key => $slider )
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ substr($slider->title, 0, 140) }}</td>
                                <td><img src="{{ asset("uploads/slider/thumbnail/".$slider->image_path) }}" alt=""></td>
                                <td> <span class="badge badge-warning py-2 px-2">Deleted</span> </td>
                                <td>

                                    <a onclick="event.preventDefault(); document.getElementById('slider-restore-id-{{ $slider->id }}').submit();" class="btn btn-sm btn-info" href="#"><i class="fas fa-trash-restore-alt"></i></a>
                                    <form id="slider-restore-id-{{ $slider->id }}" class="d-none" action="{{route('admin.trash.slider.restore',$slider->id)}}" method="post"> @csrf @method('PUT') </form>

                                    <a onclick="event.preventDefault(); document.getElementById('slider-delete-id-{{ $slider->id }}').submit();" class="btn btn-sm btn-danger" href="{{route('admin.slider.edit',$slider->id)}}"><i class="fas fa-trash-alt"></i></a>
                                    <form id="slider-delete-id-{{ $slider->id }}" class="d-none" action="{{ route('admin.trash.slider.destroy', $slider->id) }}" method="post"> @csrf @method('DELETE') </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    @else
                        {{"No slider available !!"}}
                    @endif

                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Last Updated Today at </div>
    </div>


@endsection



@push('js') @endpush
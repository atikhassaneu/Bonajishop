@extends('layouts.admin')
@section('title', 'Dashboard')
@push('css') @endpush

@section('title-btn')
    <a href="{{route('admin.slider.index')}}" class="btn btn-info">Back To Slider</a>
@endsection

@section('add-btn')
    <a href="{{route('admin.slider.edit',$slider->id )}}" class="btn btn-primary">Edit Slider</a>
@endsection


@section('content')

    <div class="card mb-3 mx-lg-5">
        <a  href="{{ asset('uploads/slider/'.$slider->image_path) }}" target="_blank" title="click here to view full Image"> <img class="card-img-top" src="{{ asset('uploads/slider/'.$slider->image_path) }}" alt="Card image"></a>
        <div class="card-body">
            <div class="card-header">
                Slider Title
            </div>
            <div class="card-body">
                {{ $slider->title }}
            </div>

            <div class="card-header">
                Slider Subtitle
            </div>
            <div class="card-body">
                {{ $slider->subtitle }}
            </div>

        </div>
    </div>


@endsection



@push('js') @endpush
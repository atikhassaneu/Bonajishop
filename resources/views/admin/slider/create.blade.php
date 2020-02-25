@extends('layouts.admin')
@section('title', 'Dashboard')
@push('css') @endpush

@section('title-btn')
    <a href="{{route('admin.slider.index')}}" class="btn btn-info">Back To Slider</a>
@endsection

@section('add-btn')
{{--        <a href="{{route('admin.slider.create')}}" class="btn btn-primary">Add New Slider</a>--}}
@endsection


@section('content')

    <div class="card mb-3 mx-lg-5">
        <div class="card-header">
            <i class="fas fa-fw fa-sliders-h"></i> Create A New Slider
        </div>

        <div class="card-body">
            @include('admin.message.msg')
            <form action="{{ route('admin.slider.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="sliderTitle">Slider Title *</label>
                    <textarea name="sliderTitle" id="sliderTitle" rows="4" class="form-control @error('sliderTitle') is-invalid @enderror">{{ old('sliderTitle') }}</textarea>
                    @error('sliderTitle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="sliderSubtitle">Slider Subtitle *</label>
                    <textarea name="sliderSubtitle" id="sliderSubtitle" rows="4" class="form-control @error('sliderSubtitle') is-invalid @enderror">{{ old('sliderSubtitle') }}</textarea>
                    @error('sliderSubtitle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="upload-btn-wrapper">
                        <button class="upload-btn" id="uploadBtn">Upload a Slider Image</button>
                        <span id="fileName" class="text-muted"> * Image Size : 1800*710</span>
                        <input type="file" id="file" name="sliderImage"/>

                        @error('sliderImage')
                        <span class="text-danger font-weight-bold small d-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-block px-3" value="Submit">


            </form>
        </div>

    </div>


@endsection



@push('js') @endpush
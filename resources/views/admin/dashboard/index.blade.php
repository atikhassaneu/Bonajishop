@extends('layouts.admin')
@section('title', 'Dashboard')
@push('css') @endpush

@section('title-btn')
    <a href="{{route('admin.dashboard.index')}}" class="btn btn-primary">Dashboard</a>
@endsection

@section('add-btn')
{{--    <a href="{{route('admin.dashboard.index')}}" class="btn btn-primary">Dashboard</a>--}}
@endsection


@section('content')




@endsection



@push('js') @endpush

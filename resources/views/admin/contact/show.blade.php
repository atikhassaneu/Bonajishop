@extends('layouts.admin')
@section('title', 'Contact')
@push('css') @endpush

@section('title-btn')
    <a href="{{route('admin.contact.index')}}" class="btn btn-info">Contact</a>
@endsection


@section('content')

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-fw fa-address-book"></i> Contact
        </div>
        <div class="card-body">
            @include('admin.message.msg')

            <div class="table-responsive">
                <table class="table" width="100%" cellspacing="0">
                    <tr>
                        <td width="20%">Name</td>
                        <td>{{ $contact->name }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{ $contact->phone }}</td>
                    </tr>
                    <tr>
                        <td>Message</td>
                        <td>{{ $contact->message }}</td>
                    </tr>

                </table>
            </div>
        </div>
        <div class="card-footer">
            <b>Sent at</b> {{$contact->created_at->format('H:i d-m-Y')}}
        </div>
    </div>


@endsection



@push('js') @endpush

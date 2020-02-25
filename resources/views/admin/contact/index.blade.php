@extends('layouts.admin')
@section('title', 'Contact')
@push('css') @endpush

@section('title-btn')
    <a href="{{route('admin.contact.index')}}" class="btn btn-info">Contact</a>
@endsection


@section('content')

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-fw fa-address-book"></i> All Contacts
        </div>
        <div class="card-body">
            @include('admin.message.msg')

            <div class="table-responsive">
                <table class="table table-bordered text-center" width="100%" cellspacing="0">
                    @if(count($contacts))
                        <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="45%">Name</th>
                            <th width="15%">Phone</th>
                            <th width="17%">Sent at</th>
                            <th width="5%">Status</th>
                            <th width="12%">Action</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach($contacts as $key => $contact )
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->created_at->diffForHumans() }}</td>
                                <td>
                                    @if($contact->status == 0)
                                        <a class="btn btn-sm btn-danger" href=""><i class="fas fa-eye-slash"></i></a>
                                    @else
                                        <a class="btn btn-sm btn-success" href=""><i class="fas fa-eye"></i></a>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-success" href="{{route('admin.contact.show',$contact->id)}}"><i class="fas fa-eye"></i></a>
                                        {{--                                    <a class="btn btn-sm btn-info" href="{{route('admin.order.edit',$order->id)}}"><i class="fas fa-pencil-alt"></i></a>--}}
                                    <a onclick="event.preventDefault(); document.getElementById('contact-delete-id-{{ $contact->id }}').submit();" class="btn btn-sm btn-danger" href="" ><i class="fas fa-trash-alt"></i></a>
                                    <form id="contact-delete-id-{{ $contact->id }}" class="d-none" action="{{ route('admin.contact.destroy', $contact->id) }}" method="post"> @csrf @method('DELETE') </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @else
                        {{"No contact available !!"}}
                    @endif

                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">{{ $contacts->links() }} </div>
    </div>


@endsection



@push('js') @endpush

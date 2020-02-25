@if(session()->has('success_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success! </strong> {{session('success_message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('error_message'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Success! </strong> {{session('error_message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
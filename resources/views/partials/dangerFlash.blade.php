@if(Session::has('message'))
    <p class="alert alert-danger">
        {{ Session::get('message') }}
    </p>
@endif
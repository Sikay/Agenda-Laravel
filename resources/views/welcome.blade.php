@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>
                
                @if (Auth::guest())
                    <div class="panel-body">
                        Para utilizar la aplicacion inicie sesion o registrese.
                    </div>
                @else
                    <div class="panel-body">
                        Bienvenido {{ Auth::user()->fullname }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

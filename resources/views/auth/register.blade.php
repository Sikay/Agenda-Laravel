@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    @include('partials.messages')

                    {{ Form::open(['route' => 'auth.store', 'method' => 'post']) }}
                        @include('admin.users.partials.fields')
                        
                        <div class="form-group">
                            {{ Form::label('password_confirmation', 'Repetir Contraseña') }}
                            {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Por favor, repita su Contraseña']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('terminos', 'Acepta Términos y Servicios') }}
                            {{ Form::checkbox('terminos', 1, null, ['class' => 'checkbox']) }}
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

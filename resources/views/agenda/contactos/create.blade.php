@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Insertar Contacto</div>

                <div class="panel-body">

                    @include('partials.messages')

                    {{ Form::open(['route' => 'agenda.contactos.store', 'method' => 'post']) }}
                        @if (Auth::user()->isAdmin())
                            <div class="form-group">
                                {{ Form::label('user_id', 'ID Usuario') }}
                                {{ Form::text('user_id', null, ['class' => 'form-control', 'placeholder' => 'Por favor, introduzca el ID del Usuario']) }}
                            </div>
                        @endif
                        @include('agenda.contactos.partials.fields')
                        <button type="submit" class="btn btn-default">
                            Añadir Contacto
                        </button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
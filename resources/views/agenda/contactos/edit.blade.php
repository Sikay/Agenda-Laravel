@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Contacto: {{ $contacto->fullname }}</div>

                <div class="panel-body">

                    @include('partials.messages')

                    {{ Form::model($contacto, ['route' => ['agenda.contactos.update', $contacto->id], 'method' => 'PUT']) }}
                        @include('agenda.contactos.partials.fields')
                        <button type="submit" class="btn btn-default">
                            Actualizar Contacto
                        </button>
                    {{ Form::close() }}

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
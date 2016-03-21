@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Usuarios</div>

                @include('partials.flash')

                <div class="panel-body">

                    {{ Form::model($request->only(['name', 'categoria']), ['route' =>'agenda.contactos.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) }}
                        <div class="form-group">
                            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de Usuario']) }}
                            {{ Form::select('categoria', config('options.categoria'), null, ['class' => 'form-control']) }}

                        </div>
                        <button type="submit" class="btn btn-default">Buscar</button>
                    {{ Form::close() }}

                    <a class="btn btn-info" href="{{ route('agenda.contactos.create') }}" role="button">
                        Introducir Contacto
                    </a>
                    <p>Hay {{ $contactos->lastPage() }} páginas</p>
                    <p>Hay {{ $contactos->total() }} usuarios</p>
                    @include('agenda.contactos.partials.table')
                    {{ $contactos->appends($request->only(['name', 'categoria']))->render() }}
                </div>
            </div>
        </div>
    </div>
</div>


{{ Form::open(['route' => ['agenda.contactos.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) }}
{{ Form::close() }}

@endsection

@section('scripts')

<script>
    $(document).ready(function () {
        $('.btn-delete').click(function (e) {

            e.preventDefault();

            var row = $(this).parents('tr');
            var id = row.data('id');
            var form = $('#form-delete');
            var url = form.attr('action').replace(':USER_ID',id);
            var data = form.serialize();

            row.fadeOut();

            $.post(url, data, function (result) {
                alert(result.message);

            }).fail(function(){
                alert('El contacto no fue eliminado');
                row.show();

            });
        });
    }); 
</script>

@endsection


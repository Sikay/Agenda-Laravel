                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Categoria</th>
                            <th>Acciones</th>
                        </tr>
                        @foreach($contactos as $contacto)
                        <tr data-id="{{ $contacto->id }}">
                            <th>{{ $contacto->id }}</th>
                            <th>{{ $contacto->fullName }}</th>
                            <th>{{ $contacto->email }}</th>
                            <th>{{ $contacto->categoria }}</th>
                            <th>
                                <a href="{{ route('agenda.contactos.edit', $contacto) }}">Editar</a>
                                <a href="" class="btn-delete">Eliminar</a>
                            </th>
                        </tr>
                        @endforeach
                    </table>
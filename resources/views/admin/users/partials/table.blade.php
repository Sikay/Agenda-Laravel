                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                        @foreach($users as $user)
                        <tr data-id="{{ $user->id }}">
                            <th>{{ $user->id }}</th>
                            <th>{{ $user->fullName }}</th>
                            <th>{{ $user->email }}</th>
                            <th>{{ $user->rol }}</th>
                            <th>
                                <a href="{{ route('admin.users.edit', $user) }}">Editar</a>
                                <a href="" class="btn-delete">Eliminar</a>
                            </th>
                        </tr>
                        @endforeach
                    </table>
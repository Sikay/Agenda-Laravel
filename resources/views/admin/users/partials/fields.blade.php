                        <div class="form-group">
                            {{ Form::label('email', 'Correo electrónico') }}
                            {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Por favor, introduzca su Email']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('firstName', 'Nombre') }}
                            {{ Form::text('firstName', null, ['class' => 'form-control', 'placeholder' => 'Por favor, introduzca su Nombre']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('lastName', 'Apellido') }}
                            {{ Form::text('lastName', null, ['class' => 'form-control', 'placeholder' => 'Por favor, introduzca sus Apellidos']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('rol', 'Rol') }}
                            {{ Form::select('rol', config('options.rol'), null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('password', 'Contraseña') }}
                            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Por favor, introduzca su Contraseña']) }}
                        </div>
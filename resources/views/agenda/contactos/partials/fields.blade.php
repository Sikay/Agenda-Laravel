                      
                        @if (!Auth::user()->isAdmin())
                            <div class="form-group">
                                {{ Form::hidden('user_id', Auth::id(), ['class' => 'form-control']) }}
                            </div>
                        @endif
                        <div class="form-group">
                            {{ Form::label('firstName', 'Nombre') }}
                            {{ Form::text('firstName', null, ['class' => 'form-control', 'placeholder' => 'Por favor, introduzca su Nombre']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('lastName', 'Apellido') }}
                            {{ Form::text('lastName', null, ['class' => 'form-control', 'placeholder' => 'Por favor, introduzca sus Apellidos']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', 'Correo electrónico') }}
                            {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Por favor, introduzca su Email']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('telefono', 'Telefono') }}
                            {{ Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Por favor, introduzca el número de Telefono']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('direccion', 'Direccion') }}
                            {{ Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Por favor, introduzca la Dirección']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('categoria', 'Categoria') }}
                            {{ Form::select('categoria', config('options.categoria'), null, ['class' => 'form-control']) }}
                        </div>
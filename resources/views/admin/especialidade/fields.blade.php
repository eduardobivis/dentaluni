<div class='form-group row'>
    <div class="col">
        {!! Form::text('nome', null, ['placeholder'=>'Nome', 'class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    @isset($entidade)
        {!! Form::submit('Editar', ['class' => 'btn btn-primary float-right']) !!}
    @else
        {!! Form::submit('Registrar', ['class' => 'btn btn-primary float-right']) !!}
    @endisset
</div>

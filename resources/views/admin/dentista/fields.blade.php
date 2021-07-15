<div class='form-group row'>
    <div class="col-md-5">
        {!! Form::text('nome', null, ['placeholder'=>'Nome', 'class' => 'form-control', 'maxlength' => 100]) !!}
    </div>
    <div class="col-md-5">
        {!! Form::text('email', null, ['placeholder'=>'E-mail', 'class' => 'form-control', 'maxlength' => 100]) !!}
    </div>
</div>
<div class='form-group row'>
    <div class="col-md-5">
        {!! Form::text('cro', null, ['placeholder'=>'CRO', 'class' => 'form-control cro', 'maxlength' => 11]) !!}
    </div>
    <div class="col-md-5">
        {!! Form::select('cro_uf', $croufOptions, null, ['class' => 'form-control', 'placeholder' => 'CRO UF']) !!}        
    </div>
</div>
<div class="form-group">
    @isset($entidade)
        {!! Form::submit('Editar', ['class' => 'btn btn-primary float-right']) !!}
    @else
        {!! Form::submit('Registrar', ['class' => 'btn btn-primary float-right']) !!}
    @endisset
</div>

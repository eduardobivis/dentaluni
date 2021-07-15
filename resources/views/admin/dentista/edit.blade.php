@extends('layouts.admin.main')

@section('css')
    <link href="{{ asset('css/ext_libs/select2.min.css') }}" rel="stylesheet">
@endsection

@section('conteudo')

    <!-- Page Heading -->
    <p class="mb-4">Editar Dentista</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">

            @if (count($errors) > 0)
                <div class="alert alert-danger pt-4">
                    <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                </div>
            @endif

            {!! Form::model($registro, ['route' => ['dentista.update', $registro->id], 'method' => 'put', 'id' => 'edit']) !!}
                @include('admin.dentista.fields')

                <div class="form-group">
                    <div>
                        <strong class="ml-1 ml-2">
                            <span class="fa fa-tooth mr-2"></span> Especialidades
                        </strong>
                    <div>
                    <select name="especialidades[]" class="form-control col-md-8 especialidades" multiple>
                        @foreach($especialidadesOptions as $key => $option)
                            @if( $especialidades->contains($key) )
                                <option value="{{ $key }}" selected> {{ $option }} </option>
                            @else
                                <option value="{{ $key }}"> {{ $option }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-3">
                    {!! Form::submit('Editar', ['class' => 'btn btn-primary float-right']) !!}
                </div>

            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('js/ext_libs/select2.min.js') }}"></script>
    <script src="{{ asset('js/admin/dentista/edit.js') }}"></script>
@endsection
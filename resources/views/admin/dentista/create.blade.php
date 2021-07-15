@extends('layouts.admin.main')

@section('css')
    <link href="{{ asset('css/ext_libs/select2.min.css') }}" rel="stylesheet">
@endsection

@section('conteudo')

    <!-- Page Heading -->
    <p class="mb-4">Inserir um novo Dentista</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">

            @if (count($errors) > 0)
                <div class="alert alert-danger pt-4">
                    <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                </div>
            @endif

            {!! Form::open(['route' => 'dentista.store', 'method' => 'post', 'id' => 'create']) !!}
                @include('admin.dentista.fields')       
                
                <div class="form-group">
                    <div>
                        <strong class="ml-1 ml-2">
                            <span class="fa fa-tooth mr-2"></span> Especialidades
                        </strong>
                    <div>
                    <select name="especialidades[]" class="form-control col-md-8 especialidades" multiple>
                        @foreach($especialidadesOptions as $key => $option)
                            <option value="{{ $key }}"> {{ $option }} </option>
                        @endforeach
                    </select>
                </div>

            <div class="form-group mt-3">
                {!! Form::submit('Registrar', ['class' => 'btn btn-primary float-right']) !!}
            </div>

            {!! Form::close() !!}
            
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('js/ext_libs/select2.min.js') }}"></script>
    <script src="{{ asset('js/admin/dentista/create.js') }}"></script>
@endsection
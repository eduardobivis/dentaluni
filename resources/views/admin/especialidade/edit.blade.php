@extends('layouts.admin.main')

@section('conteudo')


    <!-- Page Heading -->
    <p class="mb-4">Editar Especialidade</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">

            @if (count($errors) > 0)
                <div class="alert alert-danger pt-4">
                    <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                </div>
            @endif

            {!! Form::model($registro, ['route' => ['especialidade.update', $registro->id], 'method' => 'put', 'id' => 'edit']) !!}
                @include('admin.especialidade.fields')
            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('js/admin/fornecedor/edit.js') }}"></script>
@endsection
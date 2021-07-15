@extends('layouts.admin.main')

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
            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('js/admin/dentista/create.js') }}"></script>
@endsection
@extends('layouts.admin.main')

@section('conteudo')

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered display" id="tabelaEmpresas" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th class="icone-index">Editar</th>
                            <th class="icone-index">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registros as $registro)
                            <tr>
                                <td>{{ $registro->nome }}</td>
                                <td class="text-center">
                                    <a href="{{ route('especialidade.edit', $registro->id) }}">     
                                        <span class="fa fa-pencil-alt"></span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    {!! Form::open(['route' => ['especialidade.destroy', $registro->id], 'method' => 'DELETE', 'class' => 'form-deletar']) !!}
                                        {{ Form::button('<span class="fa fa-trash"></span>', 
                                            ['type' => 'submit', 'style' => 'color:red', 'class'=>"delete-button"] )  
                                        }}                        
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection
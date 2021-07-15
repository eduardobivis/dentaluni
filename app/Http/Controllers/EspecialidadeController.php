<?php

namespace App\Http\Controllers;

use App\Especialidade;
use App\Http\Requests\EspecialidadeCreateRequest;
use App\Http\Requests\EspecialidadeEditRequest;

class EspecialidadeController extends Controller {
    public function index() {
        return view(
            'admin.especialidade.index', 
            ['registros' => Especialidade::all()]
        );
    }

    public function create() {
        return view('admin.especialidade.create');
    }

    public function store(EspecialidadeCreateRequest $request) {
        Especialidade::create($request->all());
        return redirect()->route('especialidade.index');
    }

    public function edit(Especialidade $especialidade) {
        return view(
            'admin.especialidade.edit', 
            ['registro' => $especialidade] 
        );
    }

    public function update(EspecialidadeEditRequest $request, Especialidade $especialidade) {
        $especialidade->fill($request->all())->save();
        return redirect()->route('especialidade.index');
    }
    
    public function destroy(Especialidade $especialidade) {
        // foreach($especialidade->materiais as $material) {
        //     foreach($material->compras as $compra) $compra->delete();
        //     $material->delete();
        // }
        // $fornecedor->delete();
        // return redirect()->route('especialidade.index');
    }
    
}

<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Http\Requests\CompraCreateRequest;
use App\Http\Requests\CompraEditRequest;
use App\Http\Services\CompraService;
use App\Http\Services\MaterialService;

class CompraController extends Controller
{
    private $compraService;
    private $fornecedorService;
    private $materialService;

    public function __construct(
        CompraService $compraService,
        MaterialService $materialService
    ){
        $this->compraService = $compraService;
        $this->materialService = $materialService;
    }

    public function index() {
        return view(
            'admin.compra.index', 
            ['registros' => Compra::all()]
        );
    }

    public function create() {
        return view(
            'admin.compra.create', 
            [ 'materiais' => $this->materialService->getOptionsSelect() ]
        );
    }

    public function getByMaterial($material_id) {
        return view(
            'admin.compra.index_material', 
            ['registros' => Compra::where('material_id', $material_id)->get()]
        );
    }

    public function show($id) {
        return Compra::find($id);
    }

    public function store(CompraCreateRequest $request) {
        $dados = $request->all();
        $dados['data'] = date_create_from_format('d/m/Y', $dados['data'])->format('Y-m-d');
        $dados['custo_unitario'] = str_replace(',', '.', $dados['custo_unitario']);
        Compra::create($dados);
        return redirect()->route('compra.index');
    }

    public function edit(Compra $compra) {
        return view(
            'admin.compra.edit', 
            [ 
                'entidade' => $compra, 
                'materiais' => $this->materialService->getOptionsSelect() 
            ] 
        );
    }

    public function update(CompraEditRequest $request, $id) {
        $dados = $request->all();
        $dados['data'] = date_create_from_format('d/m/Y', $dados['data'])->format('Y-m-d');
        $dados['custo_unitario'] = str_replace(',', '.', $dados['custo_unitario']);
        Compra::find($id)->fill($dados)->save();
        return redirect()->route('compra.index');
    }
    
    public function destroy($id) {
        Compra::find($id)->delete();
        return redirect()->route('compra.index');
    }
}

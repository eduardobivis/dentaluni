<?php

namespace App\Http\Controllers;

use App\Dentista;
use App\DentistaEspecialidade;
use App\Http\Services\DentistaService;
use App\Http\Services\EspecialidadeService;
use App\Http\Requests\DentistaCreateRequest;
use App\Http\Requests\DentistaEditRequest;

//TODO - Dependency Injection is not working

class DentistaController extends Controller {

    private $dentistaService;
    private $especialidadeService;

    public function __construct( 
        DentistaService $dentistaService,
        EspecialidadeService $especialidadeService
    ){
        $this->dentistaService = $dentistaService;
        $this->especialidadeService = $especialidadeService;
    }

    public function index() {
        return view('admin.dentista.index',  ['registros' => Dentista::all()]);
    }

    public function create() {
        // dd( $this->especialidadeService->getOptionsSelect() );
        return view( 
            'admin.dentista.create',
            [
                'croufOptions' => $this->dentistaService->getCROUFOptionsSelect(),
                'especialidadesOptions' => $this->especialidadeService->getOptionsSelect()
            ]
        );
    }

    public function store(DentistaCreateRequest $request) {
        $this->dentistaService->store($request->all());
        return redirect()->route('dentista.index');
    }

    public function edit($dentista) {
        return view( 
            'admin.dentista.edit',
            [
                'registro' => Dentista::find($dentista), 
                'especialidades' => 
                    DentistaEspecialidade::where('dentista_id', $dentista)
                        ->pluck('especialidade_id'),
                'croufOptions' => $this->dentistaService->getCROUFOptionsSelect(),
                'especialidadesOptions' => $this->especialidadeService->getOptionsSelect()
            ]
        );
        return view('admin.dentista.edit', ['registro' => $dentista]);
    }

    public function update(DentistaEditRequest $request, $dentista) {
        $this->dentistaService->upload($request->all(), $dentista);
        return redirect()->route('dentista.index');
    }
    
    public function destroy($dentista) {
        $dentista = Dentista::find($dentista);

        //Remove Relations
        foreach( $dentista->dentistaEspecialidade as $dentistaEspecialidade) 
            $dentistaEspecialidade->delete();
            
        $dentista->delete(); 
        return redirect()->route('dentista.index');
    }

}

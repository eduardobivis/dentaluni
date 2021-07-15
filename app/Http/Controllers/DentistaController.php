<?php

namespace App\Http\Controllers;

use App\Dentista;
use App\Http\Services\DentistaService;
use App\Http\Requests\DentistaCreateRequest;
use App\Http\Requests\DentistaEditRequest;

//TODO - Dependency Injection is not working

class DentistaController extends Controller {

    private $dentistaService;

    public function __construct( DentistaService $dentistaService ){
        $this->dentistaService = $dentistaService;
    }

    public function index() {
        return view('admin.dentista.index',  ['registros' => Dentista::all()]);
    }

    public function create() {
        return view( 
            'admin.dentista.create',
            ['croufOptions' => $this->dentistaService->getCROUFOptionsSelect()]
        );
    }

    public function store(DentistaCreateRequest $request) {
        Dentista::create($request->all());
        return redirect()->route('dentista.index');
    }

    public function edit($dentista) {
        return view( 
            'admin.dentista.edit',
            [
                'registro' => Dentista::find($dentista), 
                'croufOptions' => $this->dentistaService->getCROUFOptionsSelect()
            ]
        );
        return view('admin.dentista.edit', ['registro' => $dentista]);
    }

    public function update(DentistaEditRequest $request, $dentista) {
        Dentista::find($dentista)->fill($request->all())->save();
        return redirect()->route('dentista.index');
    }
    
    public function destroy($dentista) {
        // foreach($dentista->compras as $compra) $compra->delete();
        Dentista::find($dentista)->delete();
        return redirect()->route('dentista.index');
    }

}

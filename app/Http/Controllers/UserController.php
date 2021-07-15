<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;

//Dependency Injection not working
class UserController extends Controller {

    private $service;

    public function __construct(UserService $service) {
        $this->service = $service;
    }

    public function index() {
        $usuarios = User::all();
        return view('admin.user.index', ['registros' => $usuarios]);
    }

    public function create() {
        return view('admin.user.create');
    }

    public function store(UserCreateRequest $request) {
        $dados = $request->all();
        $dados['password'] = bcrypt( $dados['password'] );
        User::create($dados);
        return redirect()->route('user.index');
    }

    public function edit($id) {
        $user = User::find($id); 
        return view('admin.user.edit', ['entidade' => $user] );
    }

    public function update(UserEditRequest $request, $id) {
        $user->fill($request->all())->save();
        return redirect()->route('user.index');
    }

    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}

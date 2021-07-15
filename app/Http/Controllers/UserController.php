<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;

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
        $this->service->store($request);
        return redirect()->route('user.index');
    }

    public function edit($id) {
        $user = User::find($id); //Dependency Injection não funciona ¯\_(ツ)_/¯
        return view('admin.user.edit', ['entidade' => $user] );
    }

    public function update(UserEditRequest $request, $id) {
        $user = User::find($id); //Dependency Injection não funciona ¯\_(ツ)_/¯
        $this->service->update($request, $id);
        return redirect()->route('user.index');
    }

    public function destroy($id) {
        $user = User::find($id); //Dependency Injection não funciona ¯\_(ツ)_/¯
        $user->delete();
        return redirect()->route('user.index');
    }
}

<?php

namespace App\Http\Controllers;
use App\User ;
use Illuminate\Http\Request;
use App\Repositories\Repository ;

class UserController extends Controller
{
    protected $model;

    public function __construct(User $user)
    {
        // set the model
        $this->model = new Repository($user);
    }

    public function index()
    {
        return $this->model->all();
    }

    public function store(Request $request)
    {
        $request->merge([
            'password' => bcrypt($request->input('password')),
        ]);
        return $this->model->create($request->only($this->model->getModel()->fillable));
    }

    public function show($id)
    {
        return $this->model->show($id);
    }

    public function update(Request $request, $id)
    {
        // update model and only pass in the fillable fields
        $this->model->update($request->only($this->model->getModel()->fillable), $id);

        return $this->model->find($id);
    }

    public function destroy($id)
    {
        return $this->model->delete($id);
    }
}


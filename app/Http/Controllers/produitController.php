<?php

namespace App\Http\Controllers;


use App\Repositories\Repository ;
use App\produit ;
use Illuminate\Http\Request;

class produitController extends Controller
{
    //space that we can use the repository from
   protected $model;

   public function __construct(produit $produit)
   {
       // set the model
       $this->model = new Repository($produit);
   }

   public function index()
   {
       return $this->model->all();
   }

   public function store(Request $request)
   {
       // create record and pass in only fields that are fillable
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


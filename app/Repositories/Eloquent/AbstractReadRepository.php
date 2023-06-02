<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\UserReadRepositoryInterface;

abstract class AbstractReadRepository implements UserReadRepositoryInterface{

    protected $model;

    public function __construct(){
        $this->model = $this->resolveModel();
    }

    public function getAll(array $search = [],$order_by = 'created_at',$type_order_by = 'desc'){
      if(!empty($search)){
        $query = $this->model::query(); 
        foreach($search as $column=>$value){
           $query->orWhere($column,'like','%'.$value.'%');
        }

        return $query->orderBy($order_by,$type_order_by)->get();
      }
      return $this->model->get();
    }

    protected function resolveModel(){
        return app($this->model);
    }
}
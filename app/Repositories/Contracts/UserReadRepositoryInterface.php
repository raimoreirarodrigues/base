<?php

namespace App\Repositories\Contracts;

interface UserReadRepositoryInterface{

    public function getAll(array $search = [],$order_by = 'created_at',$type_order_by = 'desc');
}
<?php

namespace App\Repositories\Eloquent;

use App\Order;
use App\Repositories\Contracts\OrderRepository;

use Kurt\Repoist\Repositories\Eloquent\AbstractRepository;

class EloquentOrderRepository extends AbstractRepository implements OrderRepository
{
    
    /**
     * @return string
     */
    public function model()
    {
        return Order::class;
    }

    /**
     * @return mixed
     */

    public function retrieveAll()
    {
        return this->model->all();
    }

}

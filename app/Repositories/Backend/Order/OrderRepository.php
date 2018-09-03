<?php

namespace App\Repositories\Backend\Order;

use App\Models\Order\Order;
use App\Models\Order\Item;
use App\Models\Order\Location;

class OrderRepository
{

	protected $order;

	public function __construct(Order $order)
	{
	    $this->order = $order;
	}

	public function retrieveAll()
	{
		return $this->order->where('user_id',0)->orderBy('id', 'DESC')->get();
	}

	public function find($id)
	{
		return $this->order->find($id);
	}

	public function updateRec($id, array $data)
    {
    	$order = Order::find($id);
    	return $order->update($data);
    }

    public function getAssignedOrders()
    {
    	return Order::where('is_delivered',0)->where('is_failed',0)->where('user_id','!=',0)->orderBy('id', 'DESC')->get();
    }

    public function getPickedOrders()
    {
    	return Order::where('is_delivered',0)->where('is_picked',1)->orderBy('id', 'DESC')->get();
    }

    public function getDeliveredOrders()
    {
    	return Order::where('is_delivered',1)->orderBy('id', 'DESC')->get();
    }

    public function showLocation()
    {
        return Location::first();
    }

	public function editLocation(array $data)
    {
        if(Location::first()){
        return Location::first()->update($data);
    }
    else{
        return Location::create($data)->save();
    }
    }

    public function createOrder(array $data)
    {
        return Order::create($data)->save();
    }

    public function failedOrders()
    {
        return Order::where('is_failed',1)->orderBy('id', 'DESC')->get();
    }

    public function getOrderDetails($id)
    {
        return Order::where('id' , $id)->get();
    }

}

?>
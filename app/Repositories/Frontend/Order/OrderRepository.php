<?php

namespace App\Repositories\Frontend\Order;

use App\Models\Order\Order;
use App\Models\Order\Item;
use App\Models\Order\Location;
use Auth;

class OrderRepository
{

	protected $order;

	// public function __construct(Order $order)
	// {
	//     $this->order = $order;
	// }

	public function show($id)
	{
		return Order::find($id);
	}

	public function updateOrder($id , Array $data)
	{
		return Order::where('id',$id)->update($data);

	}

	public function index()
	{
		return Order::where('user_id', Auth::id())->where('is_delivered',0)->orderBy('id', 'DESC')->get();
	}

	public function getDeliveredOrders()
	{
		return Order::where('user_id', Auth::id())->where('is_picked',1)->where('is_delivered',1)->orderBy('id', 'DESC')->get();
		
	}

	public function showItems($id)
	{
		return Item::where('order_id' , $id )->get();
	}
	public function showLocation()
	{
		return Location::first();
	}


}
?>
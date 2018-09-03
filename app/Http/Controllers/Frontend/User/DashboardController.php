<?php

namespace App\Http\Controllers\Frontend\User;

use Mapper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Frontend\Order\OrderRepository;


/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
	    protected $order;

  public function __construct(OrderRepository $order)
  {
    $this->order = $order;

  }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
    	$orders = $this->order->index();
      $location = $this->order->showLocation();
      Mapper::map($location->lat , $location->long);
      return view('frontend.user.dashboard',['orders' => $orders,
          'location' => $location
          ]);
    }


}

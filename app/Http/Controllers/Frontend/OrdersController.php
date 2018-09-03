<?php

namespace App\Http\Controllers\Frontend;

use Mapper;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Order\OrderRepository;
use Illuminate\Http\Request;

/**
 * Class DashboardController.
 */
class OrdersController extends Controller
{

    protected $order;

    public function __construct(OrderRepository $order)
    {
        $this->order = $order;

    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showOrder($id)
    {
      	$order = $this->order->show($id);
        $items = $this->order->showItems($id);
        Mapper::map($order->dest_lat,$order->dest_long);
        return view('frontend.user.showOrder',[
            'order' => $order,
            'items' => $items
            ]);
    }
    public function orderFail(Request $request){
        $order_id=$request->id;
        $this->order->updateOrder($order_id,['is_failed' => 1]);
        $client = new \GuzzleHttp\Client();
            //ECOMMERCE API HERE
         $url = "http://itiecommerce.savvy.live/wp-json/order/v3/fail";
         $request = $client->post($url,[
                 'form_params'=>[
                 'id'=> $order_id,
                 'is_failed'=> 1,
                 ]
               ]);
        return redirect()->back()->with('alert','Failed !');
    }
    public function pickedOrder(Request $request)
    {
       $order_id=$request->id;
        $this->order->updateOrder($order_id,['is_picked' => 1]);
        $client = new \GuzzleHttp\Client();
        
        //ECOMMERCE API HERE
        $url = "http://itiecommerce.savvy.live/wp-json/order/v3/track";
         $request = $client->post($url,[
           'form_params'=>[
           'id'=> $order_id,
           'is_picked'=> 1,
           ]
         ] );
         return redirect()->back()->with('alert','Successfully Picked!');
    } 

    public function deliverOrder(Request $request)
    {
        $order_id=$request->id;
        $this->order->updateOrder($order_id, ['is_delivered' => 1]);
        $client = new \GuzzleHttp\Client();

        //ECOMMERCE API HERE 
        
        $url = "http://itiecommerce.savvy.live/wp-json/order/v3/deliver";
        $request = $client->post($url,[
           'form_params'=>[
           'id'=> $order_id,
           'is_delivered'=> 1,
           ]
         ] );
    
        return redirect('dashboard')->with('alert','Thank You');; 
    }

    public function history()
    {
        $orders= $this->order->getDeliveredOrders();
        return view('frontend.user.history', ['orders' =>$orders] );
    }
}

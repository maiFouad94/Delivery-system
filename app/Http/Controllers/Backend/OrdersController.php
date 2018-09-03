<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Order\StoreOrderRequest;
use App\Http\Requests\Backend\Item\StoreItemRequest;
use App\Http\Requests\Backend\Location\StoreLocationRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Order\OrderRepository;
use App\Repositories\Backend\Item\ItemRepository;



class OrdersController extends Controller
{
    protected $order;
    protected $item;

    public function __construct(OrderRepository $order,ItemRepository $item)
    {
          $this->order = $order;

          $this->item = $item;
    }

    public function index(Request $request){
          $orders = $this->order->retrieveAll();
          return view ('backend.orders.index',[
          'orders'=>$orders  
          ]);
    }
 
     
     public function assignTo($order_id,$user_id)
     {
          $this->order->updateRec($order_id,['user_id' => $user_id ]);
          return redirect('/admin/orders');          

     }

     public function assignedOrders()
     {
          $orders = $this->order->getAssignedOrders();
          return view('backend.orders.assignedOrders',[
               'orders' => $orders]);
     }

     public function pickedOrders()
     {         
          $orders = $this->order->getPickedOrders();
          return view('backend.orders.pickedOrders',[
               'orders' => $orders]);

     }

     public function deliveredOrders()
     {         
          $orders = $this->order->getDeliveredOrders();
          return view('backend.orders.deliveredOrders',[
               'orders' => $orders]);

     }

     public function showLocation()
     {
      $location = $this->order->showLocation();
      return view('backend.orders.showLocation',[
        'location' => $location]);
     }
     

     public function editLocation(StoreLocationRequest $request)
     {
      $this->order->editLocation([
        'src_address' => $request->src_address,
        'lat' => $request->lat,
        'long' => $request->long
        ]);
      return redirect('/admin/location');
    }

    public function newOrder()
    {
      return view('backend.orders.createOrder');
    }

    public function createOrder(StoreOrderRequest $request)
    {
      $this->order->createOrder([
        'id' => $request->id,
        'dest_lat' => $request->dest_lat,
        'dest_long' => $request->dest_long,
        'user_name' => $request->user_name,
        'phone' => $request->phone,
        'dest_address' => $request->dest_address]);
      return redirect('/admin/dashboard');


    }

    public function failedOrders()
    {
      $orders = $this->order->failedOrders();
      return view('backend.orders.failedOrders',[
               'orders' => $orders]);

    }

    public function showOrder($id)
    {
      $items = $this->item->getItems($id);
      $order = $this->order->getOrderDetails($id);
      return view('backend.orders.showOrder',[
        'order' => $order,
        'items' => $items
        ]);
    }

    public function newItem($order_id)
    {

      return view('backend.orders.createItem',[
        'order_id' => $order_id ]);
    }

    public function createItem(StoreItemRequest $request,$order_id)
    {
      $this->item->createItem([
        'item_id' => $request->item_id,
        'item_name' => $request->item_name,
        'order_id' => $order_id,
       ]);
      return redirect('/admin/orders/'.$order_id.'/show');


    }

    public function deleteItem($order_id,$item_id)
    {
      $this->item->delete($item_id);
      return redirect('/admin/orders/'.$order_id.'/show');
    }




}

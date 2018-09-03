<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Models\Order\Item;
use App\Models\Order\Location;
use App\Http\Requests\StoreOrderRequest;

class OrdersController extends Controller
{ 
  public function index(){
   $orders=Order::where('user_id',auth()->id())->where('is_delivered',0)->where('is_failed',0)->orderBy('id',' DESC')->get();
   return $orders;
  }

  public function getItems($id){
    $items=Item::where('order_id',$id)->get();
    return $items;
  }

  public function pickOrder(Request $request){
    $order_id=$request->id;
    Order::where('id',$order_id)
    ->update(['is_picked' => 1]);
    $client = new \GuzzleHttp\Client();
    //external api here
  
    $url = "http://itiecommerce.savvy.live/wp-json/order/v3/track";
    $request = $client->post($url,[
       'form_params'=>[
       'id'=> $order_id,
       'is_picked'=> 1,
       ]
     ] );
     
  }
public function orderFail(Request $request){
  $order_id=$request->id;
  Order::where('id',$order_id)
  ->update(['is_failed'=>1]);
  $client = new \GuzzleHttp\Client();
      //ECOMMERCE API HERE
      
   $url = "http://itiecommerce.savvy.live/wp-json/order/v3/fail";
   $request = $client->post($url,[
           'form_params'=>[
           'id'=> $order_id,
           'is_failed'=> 1,
           ]
         ]);
         
}
  public function deliverOrder(Request $request){
    $order_id=$request->id;
    Order::where('id',$order_id)
       ->update(['is_delivered'=>1]);
       //external api here 

       $client = new \GuzzleHttp\Client();
       $url = "http://itiecommerce.savvy.live/wp-json/order/v3/deliver";
       $request = $client->post($url,[
          'form_params'=>[
          'id'=> $order_id,
          'is_delivered'=> 1,
          ]
        ]); 
      
  }

public function history(Request $request){
  $user_id=auth()->id();
  $orders= Order::where('user_id',$user_id)->where('is_picked',1)->where('is_delivered',1)->orderBy('id', 'DESC')->get();
  return $orders;

}

  public function store(StoreOrderRequest $request){
   $ids= $request->item_id;
   $items_id=explode(',',$ids);
   $names=$request->item_name;
   $items_name=explode(',',$names);
    $header=$request->header('key');
    if ($header == 'ecomm'){
      Order::create([
        'id'=> $request->id,
        'dest_lat'=>$request->dest_lat,
        'dest_long'=>$request->dest_long,
        'user_name'=>$request->user_name,
        'phone'=>$request->phone,
        'dest_address'=>$request->dest_address,
           ]);
      foreach( $items_id as $index => $item ) {
           Item::create([
             'order_id'=>$request->id,
              'item_id'=> $item,
            'item_name'=> $items_name[$index]
           ]);
         } 
         return "success";
        }
        else {
          return "error";
        }
    }
 public function showAddress(){
  $address=Location::first();
  return $address;
 }   
}


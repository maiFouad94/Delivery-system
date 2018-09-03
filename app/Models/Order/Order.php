<?php

namespace App\Models\Order;
use App\Models\Order\Traits\Relationship\OrderRelationship;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	use 
        OrderRelationship;


    protected $fillable = [
        'id',
        'dest_lat',
        'dest_long',
        'user_id',
        'src_address',
        'dest_address',
        'user_name',
        'phone',
        'is_picked',
        'is_delivered'

    ];
   
}
?>